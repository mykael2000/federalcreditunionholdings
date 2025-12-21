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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/656a13ddff45ca7d4785cf74/1hgj5r6sr';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

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

</html>
<?php /**PATH /home/decoinex/federalfirstcapitalunion.com/obn/resources/views/layouts/user/footer.blade.php ENDPATH**/ ?>