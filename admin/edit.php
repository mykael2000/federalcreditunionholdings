<?php
include "includes/header.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader

require '../dash/PHPMailer-master/src/PHPMailer.php';
require '../dash/PHPMailer-master/src/Exception.php';
require '../dash/PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$userid = $_GET['id'];
$sqleu = "SELECT * FROM clients WHERE id='$userid'";
$queryeu = mysqli_query($conn, $sqleu);
$usereu = mysqli_fetch_assoc($queryeu);
$message = "";
if (isset($_POST['submit'])) {
    $total_balance = $_POST['total_balance'];
    $active_deposits = $_POST['active_deposits'];
    $earned_total = $_POST['total_earnings'];
    $total_referrals = $_POST['total_referrals'];
    $total_bonus = $_POST['total_bonus'];

    $pending_withdrawal = $_POST['pending_withdrawal'];
    $withdrawal = $_POST['total_withdrawals'];
    $total_deposits = $_POST['total_deposits'];
    $popup = $_POST['popup'];
    $text = $_POST['text'];
    $sqlup = "UPDATE clients set total_balance='$total_balance', active_deposits='$active_deposits', total_deposits='$total_deposits', total_earnings='$earned_total', total_referrals='$total_referrals', total_bonus='$total_bonus', total_withdrawals='$withdrawal', pending_withdrawal='$pending_withdrawal', popup = '$popup', text = '$text' WHERE id='$userid'";
    $queryup = mysqli_query($conn, $sqlup);
    header("location: edit.php?id=$userid&message=success");
}
if (@$_GET['message'] == "success") {
    $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>Details Updated Successfully</div>
        </div>';
}

?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Checta Users List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Home</a></li>
            <li class="#">users</li>
            <li class="active">edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit User</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="" method="post" role="form">
                        <?php echo $message; ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    value="<?php echo $usereu['email']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputbtc">Total Balance</label>
                                <input type="text" name="total_balance" class="form-control" id="exampleInputbtc"
                                    placeholder="Enter amount" value="<?php echo $usereu['total_balance']; ?>">
                            </div>
                            <div class="form-group">
                                <!-- <label for="exampleInputbtc">Total Deposits</label> -->
                                <input type="hidden" name="total_deposits" class="form-control" id="exampleInputbtc"
                                    placeholder="Enter amount" value="<?php echo $usereu['total_deposits']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputbtc">Active Deposits</label>
                                <input type="text" name="active_deposits" class="form-control" id="exampleInputbtc"
                                    placeholder="Enter amount" value="<?php echo $usereu['active_deposits']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputbtc">Total Earnings</label>
                                <input type="text" name="total_earnings" class="form-control" id="exampleInputbtc"
                                    placeholder="Enter amount" value="<?php echo $usereu['total_earnings']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputbtc">Total Referrals</label>
                                <input type="text" name="total_referrals" class="form-control" id="exampleInputbtc"
                                    placeholder="Enter amount" value="<?php echo $usereu['total_referrals']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputbtc">Total Bonus</label>
                                <input type="text" name="total_bonus" class="form-control" id="exampleInputbtc"
                                    placeholder="Enter amount" value="<?php echo $usereu['total_bonus']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputbtc">Total Withdrawals</label>
                                <input type="text" name="total_withdrawals" class="form-control" id="exampleInputbtc"
                                    placeholder="Enter amount" value="<?php echo $usereu['total_withdrawals']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputeth">Pending Withdrawals</label>
                                <input type="text" name="pending_withdrawal" class="form-control" id="exampleInputeth"
                                    placeholder="Enter amount" value="<?php echo $usereu['pending_withdrawal']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputeth">Popup status</label>
                                <input type="text" value="<?php if($usereu['popup'] == 'block'){ echo 'Activated';}else{ echo 'Deactivated'; } ?>" disabled>
                                <select name="popup" class="form-control">
                                    <option value="none">--select--</option>
                                    <option value="block">Activate</option>
                                    <option value="none">Deactivate</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputeth">Pop up text</label>
                                <textarea class="form-control" rows="4" cols="50" name="text">
                                    <?php echo $usereu['text']; ?>
                                </textarea>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->



            </div>
            <!--/.col (left) -->
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include "includes/footer.php";

?>