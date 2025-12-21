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
                                <h5 class="text-center fs-6">Your account is currently <span class="text-danger"><?php echo e(auth('user')->user()->account_status); ?></span>, and unable to perform the transfer transaction.<br>Kindly contact our banking support at <a href="mailto:support@Federalfirstcapitalunion.com">support@Federalfirstcapitalunion.com</a></h5>
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
<?php echo $__env->make('layouts.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/decoinex/federalfirstcapitalunion.com/obn/resources/views/user/transfer/warning.blade.php ENDPATH**/ ?>