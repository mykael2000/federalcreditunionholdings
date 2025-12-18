<?php 
include('header.php');
$debit = "Debit";
$fetch_sql = "SELECT * FROM history WHERE type = '$debit'";
$fetch_query = mysqli_query($con, $fetch_sql);

?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Transactions Table</h4>
                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Tranx ID</th>
                              <th>Type</th>
                              <th>Amount</th>
                              <th>To/From</th>
                              <th>Description</th>
                              <th>Status</th>
                              <th>Date Registered</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php while($account = mysqli_fetch_assoc($fetch_query)){ ?>
                            <tr>
                              <td><?php echo $account['tranx_id']; ?></td>
                              <td><?php echo $account['type']; ?></td>
                              <td><?php echo $account['amount']; ?></td>
                              <td><?php echo $account['to_from']; ?></td>
                              <td><?php echo $account['description']; ?></td>
                              <td><?php echo $account['status']; ?></td>
                              <td><?php echo $account['created_at']; ?></td>
                              <td><a href="deletetrans.php?id=<?php echo $account['id']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
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