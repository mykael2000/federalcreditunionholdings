<?php 
include('header.php');
$fetch_sql = "SELECT * FROM users";
$fetch_query = mysqli_query($con, $fetch_sql);

?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Users Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Account Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Account type</th>
                              
                              <th>Date Registered</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php while($account = mysqli_fetch_assoc($fetch_query)){ ?>
                            <tr>
                              <td><?php echo $account['firstname'].' '.$account['middlename'].' '.$account['lastname']; ?></td>
                              <td><?php echo $account['email']; ?></td>
                              <td><?php echo $account['phone']; ?></td>
                              <td><?php echo $account['account_type']; ?></td>
                              <td><?php echo $account['created_at']; ?></td>
                              <td><a href="edit.php?id=<?php echo $account['id']; ?>" style="margin-right: 5px;" class="btn btn-primary">Edit</a><a href="delete.php?id=<?php echo $account['id']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <?php 
            include('footer.php');
          ?>