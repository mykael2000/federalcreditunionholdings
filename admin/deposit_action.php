<?php
include("includes/header.php");

$id     = intval($_GET['id'] ?? 0);
$action = $_GET['action'] ?? '';

if (!$id || !in_array($action, ['approve', 'fail'])) {
    header("Location: deposits.php");
    exit;
}

/* -------------------------
   FETCH TRANSACTION
--------------------------*/
$stmt = $conn->prepare("
    SELECT h.amount, h.status, h.client_id
    FROM history h
    WHERE h.id = ?
    LIMIT 1
");
$stmt->bind_param("i", $id);
$stmt->execute();
$tx = $stmt->get_result()->fetch_assoc();

if (!$tx || $tx['status'] !== 'Pending') {
    header("Location: deposits.php");
    exit;
}

/* -------------------------
   APPROVE
--------------------------*/
if ($action === 'approve') {

    // Credit balance
    $stmt = $conn->prepare("
        UPDATE users 
        SET total_balance = total_balance + ?
        WHERE id = ?
    ");
    $stmt->bind_param("di", $tx['amount'], $tx['client_id']);
    $stmt->execute();

    // Update history
    $stmt = $conn->prepare("
        UPDATE history 
        SET status = 'Completed'
        WHERE id = ?
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

/* -------------------------
   FAIL
--------------------------*/
if ($action === 'fail') {
    $stmt = $conn->prepare("
        UPDATE history 
        SET status = 'Failed'
        WHERE id = ?
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: deposits.php");
exit;
