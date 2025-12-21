<?php $__env->startSection('title', 'Transactions'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">All Transactions</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                </ol>
            </div>
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->

<!-- START: Main Content-->
<div class="contentbar">

    <!-- START: Card Data-->
    <div class="row">
		<?php if($success = session('success') ): ?>
		<div class="col-12 mt-1 alert alert-success"><?php echo e($success); ?></div>
		<?php endif; ?>
        <div class="col-12 mt-1">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-bordered" >
                            <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>To/From</th>
									<th>Description</th>
                                    <th>Status</th>
                                    <th>Date created</th>
									<th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $i = 0;
                                ?>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e(ucwords($transaction->type)); ?></td>
                                    <td><?php echo e($transaction->currency.number_format($transaction->amount)); ?></td>
                                    <td>
                                        <?php echo e($transaction->to_from); ?>

                                    </td>
									<td>
                                        <?php echo e($transaction->description); ?>

                                    </td>
                                    <td><span class="text-info"><?php echo e($transaction->status); ?></span></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($transaction->created_at))); ?></td>
									<td><a href="<?php echo e(route('admin.transactions.deleteTrans', $transaction->id)); ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                </tr>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div> 

        </div>                  
    </div>
    <!-- END: Card DATA-->
</div>
<!-- END: Content-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('dist/vendors/datatable/js/jquery.dataTables.min.js')); ?>"></script> 
<script src="<?php echo e(asset('dist/vendors/datatable/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/buttons/js/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/buttons/js/buttons.flash.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/vendors/datatable/buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('/dist/js/datatable.script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/decoinex/federalfirstcapitalunion.com/obn/resources/views/admin/transaction/show.blade.php ENDPATH**/ ?>