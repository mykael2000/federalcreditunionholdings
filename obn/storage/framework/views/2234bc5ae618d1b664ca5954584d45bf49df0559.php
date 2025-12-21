<?php $__env->startSection('title', 'Create | Users'); ?>


<?php $__env->startSection('content'); ?>
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">All Users</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create user</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-primary-rgba"><i class="feather icon-users mr-2"></i>Users</a>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->
<!-- START: Main Content-->
<div class="contentbar">

    <form action="<?php echo e(route('admin.users.store')); ?>" method="post">
    <?php echo csrf_field(); ?> 
    <!-- START: Card Data-->
    <div class="row">

    <?php if($success = session('success')): ?>
        <div class="col-12 col-lg-12 mt-1">
            <div class="alert alert-success"><?php echo e($success); ?></div>
        </div>
    <?php endif; ?>

    
        <div class="col-12 col-lg-7 mt-1">
            <div class="card m-b-30">
                <div class="card-header">                               
                    <h4 class="card-title">Account Information</h4>                                
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-12">
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="first_name">First name</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="First name" name="first_name">
                                                
                                            </div>
                                            <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name">Last name</label>
                                            <div class="input-group  mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Last name" name="last_name">
                                                
                                            </div>
                                            <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <div class="input-group  mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Username" name="username">
                                            
                                        </div>
                                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            
                                            <label for="email">Email</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-email"><i class="feather icon-mail"></i></span>
                                                </div>
                                                <input type="email" class="form-control" placeholder="Email" name="email">
                                            </div>
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>

                                        <div class="col-md-6">
                                            
                                            <label for="phone">Phone</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-email"><i class="feather icon-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter phone" name="phone" >
                                                
                                            </div>
                                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-8">
                                            <label for="address">Home address</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter home address" name="address">
                                                
                                            </div>
                                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="age">AGE</label>

                                            <div class="input-group mb-3">
                                                
                                                <input type="number" class="form-control" name="age">
                                                
                                            </div>
                                            <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    </div>

                                    <div class="divider">
                                        <h6 class="pb-2 border-bottom">Bank Information</h6>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <label for="account_number">Account number</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-tag"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter account number" name="account_number">
                                                
                                            </div>
                                            <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="account_balance">Account Balance</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter account balance" name="account_balance">
                                                
                                            </div>
                                            <?php $__errorArgs = ['account_balance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <label for="account_type">Account Type</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-more-horizontal"></i></span>
                                                </div>
                                                <select id="account_type" name="account_type" class="form-control">
                                                    <option value="">-- Choose --</option>
                                                    <option>Savings Account</option>
                                                    <option>Fixed Deposit Account</option>
                                                    <option>Equity Account</option>
                                                    <option>Offshore Account</option>
                                                    <option>Checking Account</option>
                                                    <option>Domiciliary Account</option>
                                                </select>
                                                
                                            </div>
                                            <?php $__errorArgs = ['account_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="transfer_mode">Transfer Mode</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-send"></i></span>
                                                </div>
                                                <select id="transfer_mode" name="transfer_mode" class="form-control">
                                                    <option value="request-otp">Request Otp from user</option>
                                                    <option value="request-ici">Request IMF, COT, IPN from user</option>
                                                    
                                                </select>
                                                
                                            </div>
                                            <?php $__errorArgs = ['transfer_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <label for="account_status">Account Status</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-user"></i></span>
                                                </div>
                                                <select id="account_status" name="account_status" class="form-control">
                                                    <option>Verified</option>
                                                    <option>Unverified</option>
                                                    <option>Dormant</option>
                                                </select>
                                                
                                            </div>
                                            <?php $__errorArgs = ['account_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="transfer_status">Transfer Status</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-send"></i></span>
                                                </div>
                                                <select id="transfer_status" name="transfer_status" class="form-control">
                                                    <option value="activated">Activated</option>
                                                    <option value="deactivated">Deactivated</option>
                                                    
                                                </select>
                                                
                                            </div>
                                            <?php $__errorArgs = ['transfer_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>


                                    </div>

                                    <div class="row">


                                        <div class="col-md-12">
                                            <label for="created_at">Date Registered</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-calendar"></i></span>
                                                </div>
                                                <input type="date"  id="created_at" name="created_at" class="form-control">
                                                
                                            </div>
                                            <?php $__errorArgs = ['created_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 mt-1">
            <div class="card">
                <div class="card-header">                               
                    <h4 class="card-title">Set Password</h4>                                
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-12">

                                    <div class="row">
                                        <label for="password" class="col-sm-12 col-form-label">New Password</label>
                                        <div class="col-sm-12">  
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password1"><i class="feather icon-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" placeholder="New Password" aria-label="Password" aria-describedby="basic-password" name="password">
                                            </div>
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="cpassword" class="col-sm-12 col-form-label">Confirm Password</label>
                                        <div class="col-sm-12">  
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password1"><i class="feather icon-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-password" name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <?php if(!empty($id)): ?>
                                                <input type="hidden" name="user_id" value="<?php echo e($id); ?>">
                                            <?php endif; ?>
                                            <button type="submit" class="btn btn-primary float-right">Save</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </form>
    <!-- END: Card DATA-->
</div>
<!-- END: Content-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/decoinex/federalfirstcapitalunion.com/obn/resources/views/admin/user/create.blade.php ENDPATH**/ ?>