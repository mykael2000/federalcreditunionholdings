<?php
include "../user-area/user/dashboard/includes/connection.php";
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if (isset($_POST['open_account'])) {
    $target_di = "../../user-area/user/dashboard/uploads/";
    $target_fil = $target_di . basename($_FILES["fileToUpload"]["name"]);
    $uploadO = 1;
    $imageFileTyp = strtolower(pathinfo($target_fil, PATHINFO_EXTENSION));

    $account_type = $_POST['account_type'];
    $account_number = rand(1000000000, 9999999999);
    $password = rand(10000, 99999);
    $pin = "0000";
    $online_id = rand(10000000, 99999999);
    $prefix = $_POST['prefix'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postal'];
    $country = $_POST['country'];

    $id_card_no = $_POST['id_card_no'];
    $id_card_type = $_POST['id_card_type'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $occupation = $_POST['occupation'];
    $income_source = $_POST['income_source'];
    $marital_status = $_POST['marital_status'];
    $joint_account = $_POST['joint_account'];
    $account_name = $_POST['account_name'];
    $total_balance = 0;
    $available_balance = 0;
    $credit_limit = 0;
    $created_at = date("Y/m/d h:i:sa");

    $target_dir = "uploads/";
    $passport = $_FILES['passport']['name'];
    $profilePic = $_FILES['fileToUpload']['name'];
    $target_file = $target_dir . basename($_FILES["passport"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_fil);

    move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file);

    $emailcheck = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $emailcheck);
    if (mysqli_num_rows($result)) {
        exit("<script>alert('email is taken')</script>");
    } else {
        $sql = "INSERT into users (
            profilePic,
            account_type,
            account_number,
            password,
            pin,
            online_id,
            prefix,
            firstname,
            lastname,
            middlename,
            phone,
            email,
            address,
            address2,
            city,
            state,
            postal,
            country,
            passport,
            id_card_no,
            id_card_type,
            dob,
            gender,
            nationality,
            occupation,
            income_source,
            marital_status,
            joint_account,
            account_name,
            total_balance,
            available_balance,
            credit_limit,
            created_at

        )VALUES(
            '$profilePic',
            '$account_type',
            '$account_number',
            '$password',
            '$pin',
            '$online_id',
            '$prefix',
            '$firstname',
            '$lastname',
            '$middlename',
            '$phone',
            '$email',
            '$address',
            '$address2',
            '$city',
            '$state',
            '$postal',
            '$country',
            '$passport',
            '$id_card_no',
            '$id_card_type',
            '$dob',
            '$gender',
            '$nationality',
            '$occupation',
            '$income_source',
            '$marital_status',
            '$joint_account',
            '$account_name',
            '$total_balance',
            '$available_balance',
            '$credit_limit',
            '$created_at'

        )";
        $query = mysqli_query($con, $sql);

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
            $mail->addAddress($email); //Add a recipient               //Name is optional

            $mail->addCC('support@federalfirstcapitalunion.com');

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Successful Registration';
            $mail->Body = '
                <html><body><div style="background-color: blue; color: white;">
        <h3 style="color: white;">Mail From support@Prime Capital Savings - Thanks for signing up</h3>
        </div><div style="background-color: white; color: black;"><hr/>
        <img src="https://federalfirstcapitalunion.comm/logo.png"><h5>Note : the details in this email should not be disclosed to anyone</<h5>
        <br><h5>Dear<br/>' . $firstname . '<h5>Here is your Online ID = ' . $online_id . '<br><h5>Here is your password = ' . $password . '<br>
        <h5>Here is your Account Number = ' . $account_number . '<br>
        <h5>Here is your transaction pin = ' . $pin . '<br><br> Kindly use the details to sign in, once signed in remember to change your pin and password</h5></div><hr/>
        <div style="background-color: white; color: black;"><h3 style="color: black;">support@Prime Capital Savings<sup>TM</sup> - Phone : 079 3952 0635</h3></div>
        </body></html>

';

            $mail->send();
            echo "<script>alert('Successful registration, please check your email')</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   
        <h3 class="text-center p-3">Create An  Account</h3>
        <div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="account_type" class="form-label">Account Type</label>
                <select id="account_type" name="account_type" class="form-control" required>
                    <option value="Savings">Savings</option>
                    <option value="Checking">Checking</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="prefix" class="form-label">Prefix</label>
                <select id="prefix" name="prefix" class="form-control" required>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Ms.">Ms.</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" id="firstname" name="firstname" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" id="middlename" name="middlename" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" id="lastname" name="lastname" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="state" class="form-label">State</label>
                <input type="text" id="state" name="state" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="country" class="form-label">Country</label>
                <input type="text" id="country" name="country" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="postal" class="form-label">Postal Code</label>
                <input type="text" id="postal" name="postal" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="id_card_no" class="form-label">ID Card Number</label>
                <input type="text" id="id_card_no" name="id_card_no" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="id_card_type" class="form-label">ID Card Type</label>
                <select id="id_card_type" name="id_card_type" class="form-control" required>
                    <option value="Passport">Passport</option>
                    <option value="Driver's License">Driver's License</option>
                    <option value="National ID">National ID</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="passport" class="form-label">Passport Image</label>
                <input type="file" id="passport" name="passport" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="fileToUpload" class="form-label">Profile Picture</label>
                <input type="file" id="fileToUpload" name="fileToUpload" class="form-control" required>
            </div>
        </div>

        <button type="submit" name="open_account" class="btn btn-primary">Create</button>
    </form>
</div>
        

</body>
</html>