@extends('layouts.user.header')

@section('title', 'Fund Transfer | Verification')

@php
$user = auth('user')->user();
@endphp

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
        <div class="col-md-8 offset-md-2 mt-2">
            <div class="card m-b-30">
                <div class="card-header">                               
                    <h2 class="border-bottom pb-3">Fund Transfer verification</h2>                                
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-12">
                                <form autocomplete="OFF" method="post" action="{{ route('user.transfer.verify') }}">
                                    @csrf
                                    
                                    @if($user->transfer_mode == 'request-otp')

                                        <div class="form-row">

                                            <div class="form-group col-md-12">
                                                <label for="otp">Please provide the OTP which was sent to your email to verify Transaction</label>
                                                <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter otp">

                                                @error('otp')
                                                    <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                                @enderror

                                            </div>

                                        </div>

                                    @endif

                                    <button type="submit" class="btn btn-primary">Confirm</button>

                                </form>
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