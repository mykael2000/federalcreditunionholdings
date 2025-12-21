 <!-- Start Footerbar -->
 <div class="footerbar">
                <footer class="footer">
                    <p class="mb-0">© <?php echo e(date('Y')); ?> Federal First Capital Union Bank - All Rights Reserved.</p>
                </footer>
            </div>
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/modernizr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/detect.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/horizontal-menu.js')); ?>"></script>
    <!-- Switchery js -->
    <script src="<?php echo e(asset('assets/plugins/switchery/switchery.min.js')); ?>"></script>
    <!-- Apex js -->
    <script src="<?php echo e(asset('assets/plugins/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/apexcharts/irregular-data-series.js')); ?>"></script>
    <!-- Vector Maps js -->
    <script src="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <!-- Slick js -->
    <script src="<?php echo e(asset('assets/plugins/slick/slick.min.js')); ?>"></script>
    <!-- Dashboard js -->
    <script src="<?php echo e(asset('assets/js/custom/custom-dashboard-crypto.js')); ?>"></script>
    <!-- Core js -->
    <script src="<?php echo e(asset('assets/js/core.js')); ?>"></script>
    <!-- End js -->
    <script>
        function destroySession() {
            event.preventDefault();
            document.getElementById('form').submit();
        }
    </script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html><?php /**PATH /home/federalfirstcapitalunion.com/public_html/obn/resources/views/layouts/admin/footer.blade.php ENDPATH**/ ?>