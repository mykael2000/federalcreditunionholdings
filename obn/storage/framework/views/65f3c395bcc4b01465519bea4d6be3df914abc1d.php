<?php $__env->startSection('title', ' Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<!-- START: Main Content-->
<div class="contentbar" style="margin-top:8rem;">
	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 col-sm-6 col-xl-3 mt-3">
			<div class="card">
				<div class="card-body">
					<img src="dist/images/traffic.png" alt="traffic" class="float-right" />
					<h6 class="card-title font-weight-bold">Total Users</h6>
					<h6 class="card-subtitle mb-2 text-muted">Active</h6>
					<h2><?php echo e(number_format($users)); ?></h2>
					<span class="text-success"><a href="<?php echo e(route('admin.users.index')); ?>" class="text-info">Click to view all</a></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-3 mt-3">
			<div class="card">
				<div class="card-body">
					<img src="dist/images/wallet.png" alt="cart" class="float-right" />
					<h6 class="card-title font-weight-bold">All Transactions</h6>
					<h6 class="card-subtitle mb-2 text-muted">Debit + credit</h6>
					<h2><?php echo e(number_format($transactions)); ?></h2>
					<span class="text-success"><a href="<?php echo e(route('admin.transactions.show')); ?>" class="text-info">Click to view all</a></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-3 mt-3">
			<div class="card">
				<div class="card-body">
					<img src="dist/images/money.png" alt="money" class="float-right" />
					<h6 class="card-title font-weight-bold">Debit Transactions</h6>
					<h6 class="card-subtitle mb-2 text-muted">Last Months</h6>
					<h2><?php echo e(number_format($debits)); ?></h2>
					<span class="text-success"><a href="<?php echo e(route('admin.transactions.show')); ?>" class="text-info">Click to view all</a></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-3 mt-3">
			<div class="card">
				<div class="card-body">
					<img src="dist/images/wallet.png" alt="wallet" class="float-right" />
					<h6 class="card-title font-weight-bold">Credit Transactions</h6>
					<h6 class="card-subtitle mb-2 text-muted">Last Months</h6>
					<h2><?php echo e(number_format($credits)); ?></h2>
					<span class="text-success"><a href="<?php echo e(route('admin.transactions.show')); ?>" class="text-info">Click to view all</a></span>
				</div>
			</div>
		</div>
		
	</div>
	<div class="row mt-5">
		<div class="col-md-10 offset-md-1">
			<?php if($success = session('success')): ?>
				<div class="alert alert-success"><?php echo e($success); ?></div>
			<?php endif; ?>
			<div class="card m-b-30">
				<div class="card-header">
					<h4>Debit/Credit user account</h4>
				</div>
				<div class="card-body">
					<form action="<?php echo e(route('admin.transactions.store')); ?>" method="post">
						<?php echo csrf_field(); ?>
						<div class="form-group">
							<label>Amount</label>
							<input type="text" name="amount" class="form-control" placeholder="0.0">
							<?php $__errorArgs = ['amount'];
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
						
						<div class="form-group">
							<label>To/From</label>
							<input type="text" name="to_from" class="form-control" placeholder="Enter transaction to or from details">
							<?php $__errorArgs = ['to_or_from'];
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
						
						<div class="form-group">
							<label>Transaction type</label>
							<select class="form-control" name="type">
								<option value="">-- Choose --</option>
								<option value="debit">Debit</option>
								<option value="credit">Credit</option>
							</select>
							<?php $__errorArgs = ['transaction_type'];
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
                      
                      <div class="form-group">
							<label>Transaction status</label>
							<select class="form-control" name="status">
								<option value="">-- Choose --</option>
								<option value="pending">Pending</option>
								<option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
							</select>
							<?php $__errorArgs = ['transaction_status'];
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
						
						<div class="form-group">
							<label>Select Account</label>
							<select class="form-control" name="account">
								<option value="">-- Choose --</option>
								<?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name.' '.$user->last_name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							<?php $__errorArgs = ['account'];
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
						
						<div class="form-group">
							<label>Enter Transaction Description</label>
							<textarea class="form-control" placeholder="Enter description...." name="description"></textarea>
							<?php $__errorArgs = ['description'];
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
						
						<div class="form-group">
							<label>Date created</label>
							<input type="date" class="form-control" name="created_at">
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
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Card DATA-->
</div>
 <!-- END: Content-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/federalfirstcapitalunion.com/public_html/obn/resources/views/admin/index.blade.php ENDPATH**/ ?>