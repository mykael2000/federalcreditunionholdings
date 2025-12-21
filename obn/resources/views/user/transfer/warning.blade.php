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
                                <h5 class="text-center fs-6">Your account is currently <span class="text-danger">{{ auth('user')->user()->account_status }}</span>, and unable to perform the transfer transaction.<br>Kindly contact our banking support at <a href="mailto:support@Federalfirstcapitalunion.com">support@Federalfirstcapitalunion.com</a></h5>
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