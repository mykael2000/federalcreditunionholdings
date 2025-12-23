<?php $__env->startSection('title', 'OBNK - Messages'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- START: Main Content-->
<div class="contentbar" style="margin-top:8rem;">

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-bordered" >
                            <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Subject</th>
                                    <th>From.Name</th>
                                    <th>From.Email</th>
                                    <th>Message</th>
                                    <th>Date created</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $i=0;
                                ?>

                                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e(++$i); ?></td>
                                    <td><?php echo e($message->subject); ?></td>
                                    <td><?php echo e($message->name); ?></td>
                                    <td><?php echo e($message->email); ?></td>
                                    <td><?php echo e($message->message); ?></td>
                    
                                    <td><?php echo e(date('d/m/y', strtotime($message->created_at))); ?></td>
                                    
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
<?php echo $__env->make('layouts.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/horizontopfinanceholding.com/public_html/obn/resources/views/admin/message/contact-page.blade.php ENDPATH**/ ?>