<?php $__env->startSection('title', 'OBNK - Transfers - Progress'); ?>

<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="<?php echo e(asset('dist/css/custom.css')); ?>">
<style>
 .progressbar-container {
  height: 40px;
  width: 100%;
  border-radius: 0.4rem;
  background: #dfe6e9;
}

.progressbar-container .progressbar {
  height: 100%;
  width: 0;
  border-radius: 0.4rem;
  background: #0984e3;
  transition: width 0.4s ease;
}


/**
 * ==============================================
 * Dot Flashing
 * ==============================================
 */
.dot-flashing {
  position: relative;
  width: 10px;
  height: 10px;
  border-radius: 5px;
  background-color: #000;
  color: #000;
  animation: dotFlashing 1s infinite linear alternate;
  animation-delay: .5s;
}

.dot-flashing::before, .dot-flashing::after {
  content: '';
  display: inline-block;
  position: absolute;
  top: 0;
}

.dot-flashing::before {
  left: -15px;
  width: 10px;
  height: 10px;
  border-radius: 5px;
  background-color: #000;
  color: #000;
  animation: dotFlashing 1s infinite alternate;
  animation-delay: 0s;
}

.dot-flashing::after {
  left: 15px;
  width: 10px;
  height: 10px;
  border-radius: 5px;
  background-color: #000;
  color: #000;
  animation: dotFlashing 1s infinite alternate;
  animation-delay: 1s;
}

@keyframes  dotFlashing {
  0% {
    background-color: #000;
  }
  50%,
  100% {
    background-color: #ebe6ff;
  }
}

</style>
<?php $__env->stopSection(); ?>

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

<!-- START: Main Content-->
<div class="contentbar">

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">                                           
                        <div class="col-md-10 offset-md-1 d-flex">                             
                            <h4 class="card-title">Initializing Transaction</h4>
                            <div class="dot-flashing ml-4 mt-2"></div>
                        </div>
                    </div>                               
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-md-10 offset-md-1">
                                <div class="progressbar-container">
                                    <div class="progressbar text-center text-white pt-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-10 offset-md-1  text-center  mt-2">
                                <div class="alert alert-primary w-100 p-4">Please be patient while we securely perform the fund <br> transfer</div>
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
<?php $__env->startSection('js'); ?>
<script>
    const progressbar = document.querySelector(".progressbar");
    const progressbarStatus = document.querySelector(".card-title");
    const changeProgress = (progress) => {
        progressbar.style.width = `${progress}%`;
        progressbar.innerHTML = `${progress}%`

        if(progress == 30) {
            progressbarStatus.innerHTML = "Performing Security HandShake"
        } else if(progress == 60) {
            progressbarStatus.innerHTML = "Checking Accounts"
        } else if(progress == 85) {
            progressbarStatus.innerHTML = "Performing Transfer"
        } else if(progress == 100) {
            progressbarStatus.innerHTML = "Completing Transfer"

            setTimeout(()=>{
                window.location = '/app/user/transfers/complete'
            }, 1000)
        }

    };

    /* change progress after 1 second (only for showcase) */
    setTimeout(() => changeProgress(10), 1000);
    setTimeout(() => changeProgress(30), 2000);
    setTimeout(() => changeProgress(60), 4600);
    setTimeout(() => changeProgress(85), 5266);
    setTimeout(() => changeProgress(100), 8000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/decoinex/federalfirstcapitalunion.com/obn/resources/views/user/transfer/progress.blade.php ENDPATH**/ ?>