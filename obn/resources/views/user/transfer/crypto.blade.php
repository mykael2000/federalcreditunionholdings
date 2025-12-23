@extends('layouts.user.header')

@section('title', 'Transfer Fund')

@section('content')



<div class="contentbar" style="margin-top:8rem;">
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card m-b-30">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="text-center">
                                    <img src="{{ asset('img/icons/75352.png') }}" class="w-50">
                                </div>
                                <h5 class="text-center fs-6">System Alert on your first Crypto Wire Transfer to process your Direct Crypto wire transfer, A one-time automated blockchain tax OTP code and gas fee is required. An automated blockchain tax otp tax code and gas fee. <br> Please Contact our Live Support chat bot our email us at <a href="mailto:admin@horizontopfinanceholding.com">admin@horizontopfinanceholding.com</a> to clear your transfer fees.
                                    Once confirmed, your crypto wire transfer will be processed and completed.</h5>
                                <div class="text-center mt-3">
                                    <a href="/app/user" class="btn btn-success text-white"><i class="feather icon-check mr-2"></i>Ok I understand</a>
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
