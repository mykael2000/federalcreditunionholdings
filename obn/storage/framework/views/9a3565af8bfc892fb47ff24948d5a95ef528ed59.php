<?php $__env->startSection('title', 'Transfer Fund'); ?>

<?php $__env->startSection('content'); ?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Transfer funds</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transfer funds</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/user/transactions" class="btn btn-primary-rgba"><i class="feather icon-eye mr-2"></i>View Transactions</a>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->

<div class="contentbar">

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-4">
            <div class="card m-b-50">
                <div class="card-header">                               
                    <h2 class="border-bottom pb-3"><strong>Fund - Send Money</strong></h2>                                
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-12">
                                <form autocomplete="OFF" method="post" action="<?php echo e(route('user.transfer.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="transfer_type">Transfer Type</label>
                                            <select class="form-control rounded" id="transfer_type" name="transfer_type">
                                                <option value="local">Domestic transfer</option>
                                                <option value="international">International Transfer</option>
                                            </select>
                                            <?php $__errorArgs = ['transfer_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="amount">Amount</label>
                                            <input type="text" class="form-control" id="amount" placeholder="Enter amount" name="amount" value="<?php echo e(old('amount')); ?>">
                                            <p>Specify amount in <strong>USD</strong> to send.</p>
                                            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    </div>

                                    <div class="border-bottom pb-1 mb-3">
                                        <p>Beneficiary Details</p>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-7">
                                            <label for="account_name">Account Name</label>
                                            <input type="text" name="account_name" id="account_name" class="form-control" placeholder="Enter beneficiary account name" value="<?php echo e(old('account_name')); ?>">
                                            <p>Specify the name of the account you want to send money to.</p>
                                            <?php $__errorArgs = ['account_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="account_number">Account Number</label>
                                            <input type="text" class="form-control" id="account_number" placeholder="Enter beneficiary account number" name="account_number" value="<?php echo e(old('account_number')); ?>">
                                            <p>Specify the account you want to send money to.</p>
                                            <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="bank_name">Bank Name</label>
                                            <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter beneficiary bank name" value="<?php echo e(old('bank_name')); ?>">
                                            <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="swift_code">Swift Code</label>
                                            <input type="text" class="form-control" id="swift_code" placeholder="Enter beneficiary swift code" name="swift_code" value="<?php echo e(old('swift_code')); ?>">
                                            <?php $__errorArgs = ['swift_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="quote">Quote</label>
                                            <textarea rows="6" type="text" class="form-control" id="quote" placeholder="Enter transfer quote" name="quote" value="<?php echo e(old('quote')); ?>"></textarea>
                                            <?php $__errorArgs = ['quote'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger" style="font-size:12px;"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Proceed</button>

                                </form>
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
<?php echo $__env->make('layouts.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/federalfirstcapitalunion.com/public_html/obn/resources/views/user/transfer/create.blade.php ENDPATH**/ ?>