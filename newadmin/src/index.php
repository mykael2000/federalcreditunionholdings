<?php 
include('header.php');
$fetch_sql = "SELECT * FROM users";
$fetch_query = mysqli_query($con, $fetch_sql);
$message = "";
if(isset($_POST['submit'])){
    $email = $_POST['account'];
    $amount = $_POST['amount'];
    $to_from = $_POST['to_from'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $tranx_id = rand(10000,99999);
    
    $his_sql = "INSERT into history (tranx_id,email,amount,to_from,type,status,description,created_at) VALUES ('$tranx_id','$email','$amount','$to_from','$type','$status','$description','$date')";
    $his_query = mysqli_query($con,$his_sql);
    $message = "<p class='alert alert-success'>Transaction added succesffully</p>";
    
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
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card card-img-holder text-black">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Users <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h6 class="card-text">Active</h6>
                    <h2 class="mb-5">0</h2>
                    <a href="users.php" class="card-text">Click to view all</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card card-img-holder text-black">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">All Transactions <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h6 class="card-text">Debit + Credit</h6>
                    <h2 class="mb-5">45,6334</h2>
                    <a href="transactions.php" class="card-text">Click to view all</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card card-img-holder text-black">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Debit Transactions <i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    
                    <h2 class="mb-5">95,5741</h2>
                    <a href="debit.php" class="card-text">Click to view all</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card card-img-holder text-black">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Credit Transactions <i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    
                    <h2 class="mb-5">95,5741</h2>
                    <a href="credit.php" class="card-text">Click to view all</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                          
                        <h3 class="card-title">Debit/Credit User Account</h3>
                        <?php echo $message; ?>
                        <form action="" method="post" class="forms-sample">
                          <div class="form-group">
                            <label for="exampleInputUsername1">Amount</label>
                            <input type="text" name="amount" class="form-control" id="exampleInputUsername1" placeholder="0.0">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputto">To/From</label>
                            <input type="text" name="to_from" class="form-control" id="exampleInputto" placeholder="Enter transactions to or from details">
                          </div>
                          <div class="form-group">
                              <label for="type">Transaction type</label>
                              <select name="type" class="form-select form-select-lg" id="type">
                                <option>--select--</option>
                                <option value="Debit">Debit</option>
                                <option class="Credit">Credit</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="status">Transaction status</label>
                              <select name="status" class="form-select form-select-lg" id="status">
                                <option>--select--</option>
                                <option value="Pending">Pending</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="account">Select Account</label>
                              <select name="account" class="form-select form-select-lg" id="account">
                                <option>--select--</option>
                                <?php while($fetch = mysqli_fetch_assoc($fetch_query)){ ?>
                                <option value="<?php echo $fetch['email']; ?>"><?php echo $fetch['email']; ?></option>
                                <?php } ?>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleTextarea1">Enter Transaction Description</label>
                            <textarea name="description" class="form-control" id="exampleTextarea1" placeholder="Enter Description...." rows="4"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputto">Date Created</label>
                            <input type="datetime-local" name="date" class="form-control" id="date" placeholder="mm/dd/yyyy">
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