<?php
include "includes/header.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// MANUAL PHPMailer LOAD (UNCHANGED)
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);
$message = "";

if (isset($_POST['submit'])) {

    // ---------------------------
    // 1. Sanitize Inputs
    // ---------------------------
    $amount      = floatval($_POST['amount']);
    $details     = trim(mysqli_real_escape_string($conn, $_POST['details']));
    $type        = $_POST['type'];
    $status      = $_POST['status'];
    $account     = intval($_POST['account']);
    $description = trim(mysqli_real_escape_string($conn, $_POST['description']));
    $created_at  = $_POST['created_at'];

    if ($amount <= 0 || !in_array($type, ['Debit','Credit'])) {
        $message = "<div class='alert alert-danger'>Invalid transaction data.</div>";
        goto end;
    }

    // ---------------------------
    // 2. Fetch User
    // ---------------------------
    $accquery = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE id = {$account} LIMIT 1"
    );

    if (mysqli_num_rows($accquery) === 0) {
        $message = "<div class='alert alert-danger'>User not found.</div>";
        goto end;
    }

    $getter = mysqli_fetch_assoc($accquery);

    $username   = $getter['username'];
    $useremail  = $getter['email'];
    $firstname  = $getter['firstname'];
    $client_id  = $getter['id'];
    $oldBalance = floatval($getter['total_balance']);

    // Better transaction ID
    $tranx_id = strtoupper(bin2hex(random_bytes(6)));

    // ---------------------------
    // 3. Calculate Balance
    // ---------------------------
    $newBal = $oldBalance;

    if ($status === 'Completed') {
        $newBal = ($type === 'Credit')
            ? $oldBalance + $amount
            : $oldBalance - $amount;
    }

    // ---------------------------
    // 4. DB TRANSACTION
    // ---------------------------
    mysqli_begin_transaction($conn);

    try {

        if ($status === 'Completed') {
            mysqli_query(
                $conn,
                "UPDATE users SET total_balance = '{$newBal}' WHERE id = '{$account}'"
            );
        }

        mysqli_query(
            $conn,
            "INSERT INTO history 
            (client_id, username, email, tranx_id, amount, details, type, status, description, created_at)
            VALUES 
            ('{$client_id}','{$username}','{$useremail}','{$tranx_id}',
             '{$amount}','{$details}','{$type}','{$status}','{$description}','{$created_at}')"
        );

        mysqli_commit($conn);

        // ---------------------------
        // 5. SUCCESS MESSAGE
        // ---------------------------
        $message = "
        <div class='alert alert-success'>
            ${$amount} {$type}ed to {$username} successfully
        </div>";

        // ---------------------------
        // 6. SEND EMAIL (UNCHANGED)
        // ---------------------------
        try {
            $mail->isSMTP();
            $mail->Host       = 'mail.federalcreditunionholdings.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'support@federalcreditunionholdings.com';
            $mail->Password   = 'trSHF@Hdo!';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('support@federalcreditunionholdings.com', 'Support');
            $mail->addAddress($useremail);
            $mail->addCC('support@federalcreditunionholdings.com');

            $mail->isHTML(true);
            $mail->Subject = 'Transaction Notification';
            $mail->Body = "
            <div style='font-family:Arial'>
                <h3>Hello {$firstname},</h3>
                <p>
                    A <strong>{$type}</strong> of <strong>$ {$amount}</strong> 
                    has been processed on your account.
                </p>
                <a href='https://federalcreditunionholdings.com/dash/auth/login.php'>
                    Login to Dashboard
                </a>
                <p style='font-size:12px'>
                    Do not share your account details with anyone.
                </p>
            </div>";

            $mail->send();

        } catch (Exception $e) {
            // Mail failure should not break transaction
        }

    } catch (Exception $e) {
        mysqli_rollback($conn);
        $message = "<div class='alert alert-danger'>Transaction failed.</div>";
    }
}

end:
mysqli_close($conn);
?>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Debit/Credit a User Account</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post" role="form">
                        <?php echo $message; ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputltc">Amount</label>
                                <input type="text" name="amount" class="form-control" id="exampleInputltc"
                                    placeholder="Enter amount">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputltc">To/From</label>
                                <input type="text" name="details" class="form-control" id="exampleInputltc"
                                    placeholder="Enter transaction to or from details">
                            </div>
                            <div class="form-group">
                                <label style="padding-right: 5px;" for="exampleInputltc">Transaction Type</label>
                                <select class="form-control" name="type">
                                    <option>-- select --</option>

                                    <option value="Debit">Debit</option>
                                    <option value="Credit">Credit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="padding-right: 5px;" for="exampleInputltc">Transaction Status</label>
                                <select class="form-control" name="status">
                                    <option>-- select --</option>

                                    <option value="Pending">Pending</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Failed">Failed</option>
                                </select>
                            </div>
                            
                            
                            <div class="form-group">
                                <label style="padding-right: 5px;" for="exampleInputltc">Select Account</label>
                                <select class="form-control" name="account">
                                    <option>
                                        -- select --</option>
                                    <?php while ($fetchuser = mysqli_fetch_assoc($query)) { ?>
                                    <option value="<?php echo $fetchuser['id']; ?>"><?php echo $fetchuser['email']; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label style="padding-right: 5px;" for="exampleInputltc">Transaction Description</label>
                                <textarea class="form-control"
                                    name="description"
                                    rows="3"
                                    placeholder="Enter transaction description..."></textarea>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputltc">Date of Transaction</label>
                                <input type="date" name="created_at" class="form-control" id="exampleInputltc">
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->



            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include "includes/footer.php";

?>