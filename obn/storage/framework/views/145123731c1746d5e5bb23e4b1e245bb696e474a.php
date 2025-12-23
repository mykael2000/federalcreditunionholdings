

<?php $__env->startSection('title', 'Transfer Fund'); ?>

<?php $__env->startSection('content'); ?>



<div class="contentbar" style="margin-top:8rem;">
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card m-b-30">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="text-center">
                                    <img src="<?php echo e(asset('img/icons/75352.png')); ?>" class="w-50">
                                </div>
                                <h5 class="text-center fs-6"><b>Congratulations on releasing your payout.</b><br>

                                    LAST PRIORITY BANK SYSTEM ALERT: INTERNATIONAL CRYPTO TRANSFER REQUEST IN PROGRESS AT 99.9%
                                    
                                    Dear account holder,
                                    
                                    You have initiated an international crypto transfer. A drop-in tracer fee, which is the last step, is required to process this transaction to get it released at 100%.
                                    
                                    Contact the bank live support team for:
                                    - Drop-in Tracer Fee to your wallet at 99.9%: [$]
                                    
                                    ACTION REQUIRED:
                                    
                                    Please confirm within the next 30 minutes to proceed with the crypto drop-in. Failure to respond will result in cancellation, and you will have to reinitiate the process.
                                    
                                    Reach out to our live support team for assistance.<span class="text-danger"><?php echo e(auth('user')->user()->account_type); ?></span>Kindly contact our banking support at <a href="mailto:admin@horizontopfinanceholding.com">admin@horizontopfinanceholding.com</a></h5>
                                <div class="text-center mt-3">
                                    <a href="/app/user" class="btn btn-success text-white"><i class="feather icon-check mr-2"></i>Ok I understand</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
<!-- END: Content-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/trustron/horizontopfinanceholding.com/obn/resources/views/user/transfer/dropin.blade.php ENDPATH**/ ?>