<?php 
include('header.php');

$id = $_GET['id'];
$fetch_sqls = "SELECT * FROM users WHERE id = '$id'";
$fetch_querys = mysqli_query($con, $fetch_sqls);
$userq = mysqli_fetch_assoc($fetch_querys);
if(isset($_POST['yes'])){
    $fetch_sql = "DELETE FROM users WHERE id = '$id'";
    $fetch_query = mysqli_query($con, $fetch_sql);
    echo "<script>alert('User deleted Successfully')</script>";
    header('refresh:1;url=users.php');
}
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
    
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                          
                        <h3 class="card-title">Are you sure you want to delete this user? <?php echo $userq['email']; ?></h3>
                      
                        <form action="" method="post" class="forms-sample">
                          
                          <button name="yes" type="submit" class="btn btn-gradient-primary me-2">yes</button>
                          <a href="users.php" class="btn btn-gradient-secondary me-2">no</a>
                         
                        </form>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          

<?php include('footer.php'); ?>