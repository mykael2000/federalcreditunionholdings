<?php $__env->startSection('title', 'Users Management'); ?>


<?php $__env->startSection('content'); ?>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">All Users</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit user</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-primary"><i class="feather icon-users mr-2"></i>Users</a>
                <a href="<?php echo e(route('admin.users.create')); ?>?id=<?php echo e($user->id); ?>" class="btn btn-primary-rgba"><i class="feather icon-user-plus mr-2"></i>Add Joint Account</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- START: Main Content-->
<div class="contentbar">

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

                                <form action="<?php echo e(route('admin.users.account-setting.update')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="first_name">First name</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="<?php echo e($user->first_name); ?>">

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
                                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="<?php echo e($user->last_name); ?>">

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
                                            <input type="text" class="form-control" placeholder="Username" value="<?php echo e($user->username); ?>" name="username">

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
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e($user->email); ?>">
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
                                                <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="<?php echo e($user->phone); ?>">

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
                                                <input type="text" class="form-control" placeholder="Enter home address" name="address" value="<?php echo e($user->address); ?>">

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

                                                <input type="number" class="form-control" name="age" value="<?php echo e($user->age); ?>">

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
                                                <input type="text" class="form-control" placeholder="Enter account number" name="account_number" value="<?php echo e($user->account_number); ?>">

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
                                                <input type="text" class="form-control" placeholder="Enter account balance" name="account_balance" value="<?php echo e($user->account_balance); ?>">

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
                                                    <option <?php if($user->account_type == 'Savings Account'): ?> selected <?php endif; ?>>Savings Account</option>
                                                    <option <?php if($user->account_type == 'Fixed Deposit Account'): ?> selected <?php endif; ?>>Fixed Deposit Account</option>
                                                    <option <?php if($user->account_type == 'Equity Account'): ?> selected <?php endif; ?>>Equity Account</option>
                                                    <option <?php if($user->account_type == 'Offshore Account'): ?> selected <?php endif; ?>>Offshore Account</option>
                                                    <option <?php if($user->account_type == 'Checking Account'): ?> selected <?php endif; ?>>Checking Account</option>
                                                    <option <?php if($user->account_type == 'Domiciliary Account'): ?> selected <?php endif; ?>>Domiciliary Account</option>
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
                                                    <option value="request-otp" <?php if($user->transfer_mode =='request-otp'): ?> selected <?php endif; ?>>Request Otp from user</option>
                                                    <option value="request-ici" <?php if($user->transfer_mode =='request-ici'): ?> selected <?php endif; ?>>Request IMF, COT, IPN from user</option>

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
                                                    <option <?php if($user->account_status == 'Verified'): ?> selected <?php endif; ?>>Verified</option>
                                                    <option <?php if($user->account_status == 'Unverified'): ?> selected <?php endif; ?>>Unverified</option>
                                                    <option <?php if($user->account_status == 'Dormant'): ?> selected <?php endif; ?>>Dormant</option>
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
                                                    <option value="activated" <?php if($user->transfer_status =='activated'): ?> selected <?php endif; ?>>Activated</option>
                                                    <option value="deactivated" <?php if($user->transfer_status =='deactivated'): ?> selected <?php endif; ?>>Deactivated</option>

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
                                                <input type="date"  id="created_at" name="created_at" class="form-control" value="<?php echo e(date('Y-m-d', strtotime($user->created_at))); ?>">

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


                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="user_passport">User Passport</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <input type="file" class="form-control" name="passport">

                                            </div>
                                            <?php $__errorArgs = ['passport'];
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
                                            <div class="form-group">
                                                <?php if(empty($user->profile)): ?>
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Placeholder_no_text.svg/1200px-Placeholder_no_text.svg.png" class="img-thumbnail w-100">
                                                <?php else: ?>
                                                <img src="<?php echo e($user->profile); ?>" class="img-thumbnail w-100">
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        

                                        <div class="col-md-6">
                                            <label for="first_name">Tax status</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <select class="form-control" name="tax_status">

                                                    <option value="active" <?php if($user->tax_status =='active'): ?> selected <?php endif; ?>>Activate</option>
                                                    <option value="inactive" <?php if($user->tax_status =='inactive'): ?> selected <?php endif; ?>>Deactivate</option>

                                                </select>
                                            </div>
                                            <?php $__errorArgs = ['tax_status'];
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
                                            <label for="first_name">Transfer OTP</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter users OTP" name="otp" value="<?php echo e($user->otp); ?>">

                                            </div>
                                            <?php $__errorArgs = ['otp'];
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

                                    <div class="form-group mt-3">
                                        <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 mt-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change password</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="post" action="<?php echo e(route('admin.users.account-setting.change-password')); ?>">
                                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                    <?php echo csrf_field(); ?>

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
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Task Notification</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.user.account-setting.send-notification')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Enter notification details</label>
                                <textarea required rows="10" class="form-control" name="message" placeholder="Write here..."></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                    <button type="submit" class="btn btn-primary">Send notification</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- END: Card DATA-->
</div>
<!-- END: Content-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/federalfirstcapitalunion.com/public_html/obn/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>