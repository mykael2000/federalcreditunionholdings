<?php

include "includes/header.php";

?>
<div class="content-w">
    <div class="content-i">
        <div class="content-box">


            <div class="element-wrapper">
                <h6 class="element-header">Transactions</h6>
                <div class="element-box-tp">
                    <div class="table-responsive">
                        <table class="table table-padded">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Transaction ID</th>
                                    <th>Narration</th>
                                    <th>Details</th>
                                    <th>Type</th>
                                    <th class="">Status</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>

                            <?php
$userid = $user['id'];
$useremail = $user['email'];
$transsql = "SELECT * FROM history WHERE email ='$useremail' ORDER BY created_at DESC";
$transquery = mysqli_query($con, $transsql);
while ($fetchtrans = mysqli_fetch_assoc($transquery)) {

    ?>
                            <tbody>
                                <tr>

                                    <td><span><?php echo $fetchtrans['created_at'] ?> </span></td>
                                    <td class="cell-with-media"><span>#<?php echo $fetchtrans['tranx_id'] ?> </span></td>
                                    <td class="cell-with-media"><span><?php echo $fetchtrans['description'] ?> </span>
                                    </td>
                                    <td class="cell-with-media"><span><?php echo $fetchtrans['to_from'] ?> </span></td>
                                    <td class="cell-with-media"><span
                                            style="color: <?php if ($fetchtrans['type'] == 'Credit') {echo 'green';} else {echo 'red';}?>"><?php echo $fetchtrans['type'] ?>
                                        </span></td>

                                    <td class="nowrap"><span
                                            class="status-pill smaller <?php if ($fetchtrans['status'] == "Pending") {echo "red";} else {echo "green";}?> "></span><span><?php echo $fetchtrans['status'] ?>
                                        </span></td>
                                    <td style="color: red;" class="text-right bolder nowrap"><span
                                            class="<?php if ($fetchtrans['type'] == "Credit" || $fetchtrans['type'] == "Loan" || $fetchtrans['type'] == "Inheritance") {echo "text-success";} else {} ?>"><?php echo number_format($fetchtrans['amount'], 2, '.', ','); ?>
                                        </span></td>
                                </tr>

                            </tbody>
                            <?php
}?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



</div>
<?php
include "includes/footer.php";
?>