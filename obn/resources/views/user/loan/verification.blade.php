@extends('layouts.user.header')

@section('title', 'OBNK - Loan - Verification')

@section('content')

<!-- START: Main Content-->
<main>
<div class="container-fluid">
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">Loans</h4></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Loans</li>
                    <li class="breadcrumb-item active"><a href="#">verification</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
       
        <div class="col-md-8 offset-md-2 mt-4">
            <div class="card">
                <div class="card-header">                               
                    <h4 class="card-title">Your Loan verification</h4>                                
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-12">
                                <form autocomplete="OFF" method="post" action="{{ route('user.loan.verify') }}">
                                    @csrf
                                    

                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label for="otp">OTP</label>
                                            <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter otp">

                                            @error('otp')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror

                                        </div>

                                    </div>


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
    <div class="mb-5" style="margin-top:10rem"></div>
</div>
</main>
<!-- END: Content-->

@endsection