<?php 
include('header.php');
$id = $_GET['id'];
$fetch_sql = "SELECT * FROM users WHERE id = '$id'";
$fetch_query = mysqli_query($con, $fetch_sql);
$user = mysqli_fetch_assoc($fetch_query);
$message = "";
if(isset($_POST['submit'])){
    $target_di = "../../user-area/user/dashboard/uploads/";
    $target_fil = $target_di . basename($_FILES["fileToUpload"]["name"]);
    $uploadO = 1;
    $imageFileTyp = strtolower(pathinfo($target_fil, PATHINFO_EXTENSION));
    $profilePic = $_FILES['fileToUpload']['name'];
    if(!empty($profilePic)){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_fil);
        $updatepic = "UPDATE users set profilePic = '$profilePic' WHERE id = '$id'";
    $querypic = mysqli_query($con, $updatepic);
    }
    

    $newTotalBalance = $_POST['total_balance'];
    $newAvailableBalance = $_POST['available_balance'];
    $newCreditLimit = $_POST['credit_limit'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postal'];
    $country = $_POST['country'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $account_number = $_POST['account_number'];
    $account_type = $_POST['account_type'];
    $account_status = $_POST['account_status'];
    $code_status = $_POST['code_status'];
    $created_at = $_POST['created_at'];
    $code = $_POST['code'];
    
    $update = "UPDATE users set total_balance = '$newTotalBalance', available_balance = '$newAvailableBalance', credit_limit = '$newCreditLimit', firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', phone = '$phone', address = '$address', city = '$city', state = '$state', postal = '$postal', country = '$country', dob = '$dob', email = '$email', account_number = '$account_number', account_type = '$account_type', account_status = '$account_status', code_status = '$code_status', created_at = '$created_at', code = '$code' WHERE id = '$id'";
    $query = mysqli_query($con, $update);
    $message = "<p class='alert alert-success'>User details updated succesffully</p>";
    
    header("refresh:1;url=edit.php?id=$id");
    
}
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                          
                        <h3 class="card-title">Account Information</h3>
                        <?php echo $message; ?>
                        <form action="" method="post" class="forms-sample" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $user['firstname']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="middlename">Middlename</label>
                            <input type="text" name="middlename" class="form-control" id="middlename" value="<?php echo $user['middlename']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" value="<?php echo $user['lastname']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="emmail">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo $user['email']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $user['phone']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="<?php echo $user['address']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" value="<?php echo $user['city']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" class="form-control" id="state" value="<?php echo $user['state']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="postal">Postal</label>
                            <input type="text" name="postal" class="form-control" id="postal" value="<?php echo $user['postal']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" id="country" value="<?php echo $user['country']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="dob">Dob</label>
                            <input type="text" name="dob" class="form-control" id="dob" value="<?php echo $user['dob']; ?>">
                          </div>
                          <h3 class="card-title p-4">Bank Information</h3>
                          <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" name="account_number" class="form-control" id="account_number" value="<?php echo $user['account_number']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="account_type">Account type</label>
                            <input type="text" name="account_type" class="form-control" id="account_type" value="<?php echo $user['account_type']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="total_balance">Account balance</label>
                            <input type="text" name="total_balance" class="form-control" id="total_balance" value="<?php echo $user['total_balance']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="available_balance">Available balance</label>
                            <input type="text" name="available_balance" class="form-control" id="available_balance" value="<?php echo $user['available_balance']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="credit_limit">Credit limit</label>
                            <input type="text" name="credit_limit" class="form-control" id="credit_limit" value="<?php echo $user['credit_limit']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="account_status">Account status</label>
                              <select name="account_status" class="form-select form-select-lg" id="accoun_status">
                                <option value="<?php echo $user['account_status']; ?>">--select--</option>
                                <option value="Active">Activate</option>
                                <option value="Blocked">Block</option>
                                
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="code_status">Transfer status</label>
                              <select name="code_status" class="form-select form-select-lg" id="code_status">
                                <option value="<?php echo $user['code_status']; ?>">--select--</option>
                                <option value="active">Activate</option>
                                <option value="deactive">Deactivate</option>
                                
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="code">Transfer Code</label>
                            <input type="text" name="code" class="form-control" id="code" value="<?php echo $user['code']; ?>">
                          </div>
                          <div class="form-group">
                                                <label>User Passport</label>
                                                <div class="input-group">
                                              
                                                    <input type="file" name="fileToUpload" placeholder="enter picture"
                                                        class="form-control">
                                                    <img height="60px" width="60px"
                                                        src="../../user-area/user/dashboard/uploads/<?php echo $user['profilePic']; ?>"
                                                        alt="no image available">
                                                </div>
                                            </div>
                          <div class="form-group">
                            <label for="exampleInputto">Date Registered</label>
                            <input type="text" name="created_at" class="form-control" id="date" value="<?php echo $user['created_at']; ?>">
                          </div>
                          <button name="submit" type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                         
                        </form>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          
          <?php 
            include('footer.php');
          ?>