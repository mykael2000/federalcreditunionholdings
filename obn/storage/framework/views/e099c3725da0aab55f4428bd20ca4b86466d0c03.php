<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">All Users</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary-rgba"><i class="feather icon-user-plus mr-2"></i>Add user</a>
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
        <div class="col-12 mt-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-bordered" >
                            <thead>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Account Type</th>
                                    <th>Age</th>
                                    <th>Date Registered</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(ucwords($user->first_name.' '.$user->last_name)); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->phone); ?></td>
                                    <td><span class="badge badge-info badge-pill"><?php echo e($user->account_type); ?></span></td>
                                    <td><?php echo e($user->age); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($user->created_at))); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.users.show', $user->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="<?php echo e(route('admin.users.delete', $user->id)); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        <a href="<?php echo e(route('admin.users.login-as', $user->id)); ?>" class="btn btn-success btn-sm mt-1 form-control" style="background-color:#44bd32;color:#fff;">Login As</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Account Type</th>
                                    <th>Age</th>
                                    <th>Date Registered</th>
                                    <th></th>
                                </tr>
                            </tfoot>
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
<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/federalfirstcapitalunion.com/public_html/obn/resources/views/admin/user/index.blade.php ENDPATH**/ ?>