<?php
include("../connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: loan_list.php");
    exit;
}

$loanId = $_POST['loan_id'];
$action = $_POST['action'] ?? '';

if (!$loanId || !in_array($action, ['approve', 'reject'])) {
    $_SESSION['error'] = "Invalid request.";
    header("Location: loan_list.php");
    exit;
}

/* FETCH LOAN */
$stmt = $conn->prepare("
    SELECT loan_id, user_id, amount, status
    FROM loans
    WHERE loan_id = ?
");
$stmt->bind_param("s", $loanId);
$stmt->execute();
$loan = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$loan || $loan['status'] !== 'Pending') {
    $_SESSION['error'] = "Loan already processed or not found.";
    header("Location: loan_list.php");
    exit;
}

/* START TRANSACTION */
$conn->begin_transaction();

try {

    if ($action === 'approve') {

        /* UPDATE LOAN */
        $stmt = $conn->prepare("
            UPDATE loans 
            SET status = 'Approved'
            WHERE loan_id = ?
        ");
        $stmt->bind_param("s", $loanId);
        $stmt->execute();
        $stmt->close();

        /* CREDIT USER BALANCE */
        $stmt = $conn->prepare("
            UPDATE users
            SET total_balance = total_balance + ?
            WHERE id = ?
        ");
        $stmt->bind_param("di", $loan['amount'], $loan['user_id']);
        $stmt->execute();
        $stmt->close();

        /* OPTIONAL: LOG TO HISTORY */
        $tranx_id = 'LN' . strtoupper(bin2hex(random_bytes(5)));

        $stmt = $conn->prepare("
            INSERT INTO history
            (client_id, tranx_id, amount, type, status, description, created_at)
            VALUES (?, ?, ?, 'Credit', 'Completed', 'Loan Disbursement', NOW())
        ");
        $stmt->bind_param(
            "isd",
            $loan['user_id'],
            $tranx_id,
            $loan['amount']
        );
        $stmt->execute();
        $stmt->close();

    } else {

        /* REJECT LOAN */
        $stmt = $conn->prepare("
            UPDATE loans 
            SET status = 'Rejected'
            WHERE loan_id = ?
        ");
        $stmt->bind_param("s", $loanId);
        $stmt->execute();
        $stmt->close();
    }

    $conn->commit();
    $_SESSION['success'] = "Loan successfully {$action}ed.";

} catch (Exception $e) {

    $conn->rollback();
    $_SESSION['error'] = "Operation failed. Please try again.";
}

header("Location: loan_list.php");
exit;
