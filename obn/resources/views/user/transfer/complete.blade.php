@extends('layouts.user.header')

@section('title', 'OBNK - Transfers - Progress')

@section('content')
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
                <a href="/app/user/transactions" class="btn btn-primary-rgba"><i class="feather icon-eye mr-2"></i>View Transactions</a>
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
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-md-8 offset-md-2">
                                <div class="text-center">
                                    <img src="{{ asset('img/icons/89479312-validation-icon-isolated-on-special-blue-round-button-abstract-illustration.jpg') }}" class="w-50">
                                </div>
                                <h5 class="text-center fs-6">Your transfer has been completed successfully!</h5>
                                <div class="text-center mt-3">
                                    <a href="/app/user/transactions" class="btn btn-success text-white"><i class="feather icon-eye mr-2"></i>View Transactions</a>
                                </div>
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

@endsection