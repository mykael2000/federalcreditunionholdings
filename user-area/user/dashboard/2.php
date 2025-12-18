<?php
include "includes/header.php";
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader

require '../../../PHPMailer-master/src/PHPMailer.php';
require '../../../PHPMailer-master/src/Exception.php';
require '../../../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if (isset($_POST['transfer'])) {
    $userid = $user['id'];
    $emailot = $user['email'];
    $otp = rand(1000, 9999);
    $tranx_id = rand(1000, 9999);
    $account_from = $_POST['account_from'];
    $account_to = $_POST['account_to'];
    $amount = $_POST['amount'];
    $naration = $_POST['naration'];
    $pin = $_POST['pin'];
    $status = "failed";
    $created_at = date("Y/m/d h:i:sa");
    $details = $account_to;
    $description = "Wire Transfer";
    $mode = "Debit";

    $statusco = "successfull";
    if ($user['pin'] !== $pin) {
        echo "<script>alert('your pin is invalid')</script>";
    } else {

        $sqltransfer = "INSERT into transactions (userid, tranx_id, account_from, account_to, amount, naration, status, otp, created_at) VALUES ('$userid', '$tranx_id', '$account_from', '$account_to', '$amount', '$naration', '$status', '$otp', '$created_at')";
        $querytransfer = mysqli_query($con, $sqltransfer);

        $sqltransferde = "INSERT into deposits (userid, email, tranx_id, amount, mode, details, description, status, created_at) VALUES ('$userid', '$emailot', '$tranx_id', '$amount', '$mode', '$details', '$description', '$status', '$created_at')";
        $querytransferde = mysqli_query($con, $sqltransferde);

        try {
            //Server settings
            $mail->SMTPDebug = 0; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'mail.federalfirstcapitalunion.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'support@federalfirstcapitalunion.com'; //SMTP username
            $mail->Password = 'edF@8307Gh71'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('support@federalfirstcapitalunion.com', 'Support');
            $mail->addAddress($emailot); //Add a recipient               //Name is optional

            $mail->addCC('support@federalfirstcapitalunion.com');

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'One time password';
            $mail->Body = '
                <html><body><div style="background-color: blue; color: white;">
        <h3 style="color: white;">Mail From federalfirstcapitalunion - Thanks for initiating a transaction</h3></div><div style="background-color: white; color: black;"><hr/>
        <h5>Note : the details in this email should not be disclosed to anyone</<h5><br><h5>Dear<br/>' . $user['firstname'] . '
        <h5>Here is your One Time Verification pin = ' . $otp . '
        <br> Kindly input it in your transaction to confirm the transfer</h5></div><hr/><div style="background-color: white; color: black;">
        <h3 style="color: black;">federalfirstcapitalunion<sup>TM</sup> - Phone : +1 (678) 807-9514</h3></div></body></html>

';

            $mail->send();
            echo "<script>alert('please check your email for your code')</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        header("location: process1.php?tranx=$tranx_id&amount=$amount");

    }

}

?>
<div class="content-w">
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper" style="float: none;margin: auto; max-width: 600px;">
                <div class="element-box">
                    <h6 class="element-header">Make Transfer </h6>

                    <p>
                        <i class="fa fa-info-circle"></i> Transfer funds to First Union City accounts.
                    </p>
                    <form action="" method="post">

                        <div class="form-group">
                            <label class="mr-sm-2 lighter">From</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text text-primary"><i class="fa fa-bank"></i></label>
                                </div>

                                <select class="form-control" name="account_from" required="">
                                    <option value="">Select Account</option>
                                    <option value="<?php echo $user['account_number']; ?>">
                                        <?php echo $user['account_type']; ?>-- <?php echo $user['account_number']; ?>
                                    </option>




                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2 lighter">Beneficiary Account </label>
                            <div class="input-group">
                                <input type="text" name="account_to" class="form-control"
                                    placeholder="Enter Account Number" required="">

                            </div>
                        </div>

                        <div class="input-group mb-3">

                            <input type="number" name="amount" class="form-control" placeholder="Enter Amount"
                                value="0.00" required="">
                            <div class="input-group-prepend">
                                <label class="input-group-text text-primary">USD</label>
                            </div>



                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2 lighter">Naration(optional)</label>
                            <div class="input-group">
                                <textarea name="naration" class="form-control" placeholder="Naration"></textarea>

                            </div>

                        </div>
                        <div class="form-group">
                            <label class="mr-sm-2 lighter">Transaction Pin</label>
                            <input class="form-control" type="text" name="pin" placeholder="Enter pin" required="">
                        </div>

                        <div class="form-buttons-w text-right">
                            <button type="submit" name="transfer" class="btn btn-primary text-uppercase"> Continue <span
                                    class="os-icon os-icon-arrow-right-circle"></span></i>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>






</div>
<?php
include "includes/footer.php";
?>