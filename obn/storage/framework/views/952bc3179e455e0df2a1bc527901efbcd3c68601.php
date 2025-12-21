<?php $__env->startSection('title', 'Dashboard'); ?>
<?php
$user = auth('user')->user();
?>
<?php $__env->startSection('content'); ?>

<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar" style="background-color: transparent;">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8 pl-0">
            <h4 class="page-title"><strong>Hi, <?php echo e(ucwords($user->first_name.' '.$user->last_name)); ?></strong></h4>
            <p class="mt-2">Last login was <?php echo e(date('j, F Y', strtotime($user->updated_at))); ?></p>
        </div>
        <div class="col-md-4 col-lg-4 pr-0">
            <div class="widgetbar">
                <a href="<?php echo e(route('user.accounts.index')); ?>" class="btn btn-primary mr-2">View Accounts</a>
                <a href="<?php echo e(route('user.accounts.create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Add Account</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">

        <!-- Start col -->
        <div class="col-lg-4">
            <div class="card text-left m-b-30 bg-primary">
                <div class="card-header">
                    <h4 class="card-title mb-1 text-white"><strong>Name:</strong> <?php echo e(ucwords($user->first_name.' '.$user->last_name)); ?></h4>
                    <h4 class="card-title mb-0 text-white"><strong>Account type:</strong> <?php echo e(ucwords($user->account_type)); ?></h4>
                </div>
                <div class="card-body mb-0">
                    <h4 class="mb-0" style="visibility: hidden;"><strong>Account type:</strong></h4>
                    <h6 style="visibility: hidden;"><strong>CODEHOLDER</strong></h6>
                    <p style="visibility: hidden;">DATE HOLDER</p>
                </div>
                <div class="progress" style="height: 5px;visibility: hidden;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <!-- End col -->

        <!-- Start col -->
        <div class="col-lg-4">
            <div class="card text-left m-b-30">
                <div class="card-header">
                    <h4 class="card-title mb-0"><strong><?php echo e(ucwords($user->currency)); ?></strong></h4>
                </div>
                <div class="card-body mb-0">
                    <h3 class="mb-3"><?php if(empty($user->account_balance)): ?>0.0 <?php else: ?><?php echo e(number_format($user->account_balance, 2)); ?><?php endif; ?></h3>
                    <h6><strong>Current Balance</strong></h6>
                    <p>As of <?php echo e(date('F Y')); ?></p>
                </div>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <!-- End col -->

        <!-- Start col -->
        <div class="col-lg-4">
            <div class="card text-left m-b-30">
                <div class="card-header">
                    <h4 class="card-title mb-0"><strong><?php echo e($totalAccounts); ?></strong></h4>
                </div>
                <div class="card-body mb-0">
                    <h3 class="mb-3">Total Accounts</h3>
                    <h6 style="visibility: hidden;"><strong>CODEHOLDER</strong></h6>
                    <p style="visibility: hidden;">DATE HOLDER</p>
                </div>
                <div class="progress" style="height: 5px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <!-- End col -->

    </div>
    <!-- End row -->



    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-4">

            <div class="row">

                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-header text-center">
                            <h5 class="card-title mb-0">Picture Identification</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="img-card w-50 m-auto">
                                <?php if(empty($user->profile)): ?>
                                <img src="<?php echo e(asset('img/488px-No-Image-Placeholder.svg.png')); ?>" class="w-100 img-thumbnail">
                                <?php else: ?>
                                <img src="/app<?php echo e($user->profile); ?>" class="w-100 img-thumbnail">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <!-- Start col -->
                <div class="col-lg-12 col-xl-12">
                    <div class="credit-card m-b-30">
                        <div style="background-image: url('https://e1.pxfuel.com/desktop-wallpaper/370/107/desktop-wallpaper-blue-blank-blue-abstract-gallery-90-plus-pic-blue-screen-s-thumbnail.jpg')" class="credit-card__front credit-card__part">
                            <img class="credit-card__front-square credit-card__square" src="assets/images/credit-card.png">
                            <img class="credit-card__front-logo credit-card__logo" src="<?php echo e(asset('assets/images/logo-visa-grey.png')); ?>">
                            <p class="credit-card_numer">**** **** **** 9876</p>
                            <div class="credit-card__space-75">
                            <span class="credit-card__label">Card holder</span>
                            <p class="credit-card__info"><?php echo e(ucwords($user->first_name.' '.$user->last_name)); ?></p>
                            </div>
                            <div class="credit-card__space-25">
                            <span class="credit-card__label">Expires</span>
                                    <p class="credit-card__info">10/25</p>
                            </div>
                        </div>

                        <div style="background-image: url('https://e1.pxfuel.com/desktop-wallpaper/370/107/desktop-wallpaper-blue-blank-blue-abstract-gallery-90-plus-pic-blue-screen-s-thumbnail.jpg')" class="credit-card__back credit-card__part">
                            <div class="credit-card__black-line"></div>
                            <div class="credit-card__back-content">
                            <div class="credit-card__secret">
                                <p class="credit-card__secret--last">934</p>
                            </div>
                            <img class="credit-card__back-square credit-card__square" src="<?php echo e(asset('assets/images/credit-card.png')); ?>">
                            <img class="credit-card__back-logo credit-card__logo" src="<?php echo e(asset('assets/images/logo-visa-grey.png')); ?>">

                            </div>
                        </div>

                    </div>
                </div>
                <!-- End col -->

            </div>

        </div>
        <!-- End col -->

        <!-- Start col -->
        <div class="col-lg-12 col-xl-8">
            <div class="row">

                <div class="col-lg-12 col-xl-12">

                    <div class="card m-b-30 dash-widget">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h5 class="card-title mb-0">Recent Transactions</h5>
                                </div>
                                <div class="col-7">
                                    <ul class="nav nav-pills float-right" id="pills-earning-tab-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-month-tab-justified" data-toggle="pill" href="#pills-month-justified" role="tab" aria-selected="true">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-week-tab-justified" data-toggle="pill" href="#pills-week-justified" role="tab" aria-selected="false">Week</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-0">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Desc</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $i=0;
                                      ?>
                                       <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>
                                            <td><strong><?php echo e(strtoupper($transaction->type)); ?></strong></td>
                                            <td><?php echo e(auth('user')->user()->currency.$transaction->amount); ?></td>
                                            <td><?php echo e($transaction->description); ?></td>
                                            <?php if($transaction->status == "pending"): ?>
                                            <td><span class="badge badge-primary-inverse">Pending</span></td>
                                            <?php elseif($transaction->status == "complete"): ?>
                                            <td><span class="badge badge-success-inverse">Complete</span></td>
                                            <?php else: ?>
                                            <td><span class="badge badge-info-inverse"><?php echo e($transaction->status); ?></span></td>
                                            <?php endif; ?>
                                            <td><?php echo e(date('D j, F Y', strtotime($transaction->created_at))); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr><td colspan="7" class="text-center">No Transaction found</td></tr>
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- End col -->

    </div>
    <!-- End row -->

</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/decoinex/federalfirstcapitalunion.com/obn/resources/views/user/index.blade.php ENDPATH**/ ?>