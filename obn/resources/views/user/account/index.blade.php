@extends('layouts.user.header')

@section('title', 'Account Details')


@section('content')

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Account Security</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('user.profile') }}" class="btn btn-primary-rgba"><i class="feather icon-eye mr-2"></i>View Profile</a>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->

<!-- START: Main Content-->
    <div class="contentbar">
        <!-- START: Card Data-->
        <div class="row">

        @if($success = session('success'))
            <div class="col-12 col-lg-12 mt-2">
                <div class="alert alert-success">{{ $success }}</div>
            </div>
        @endif

            <div class="col-12 col-lg-10 offset-lg-1 mt-3">
                <div class="card m-b-50">
                    <div class="card-header">                               
                        <h4 class="card-title">Change password</h4>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    <form method="post" action="{{ route('user.account-setting.change-password') }}">
                                        @csrf
                                        <div class="row">
                                            <label for="old_password" class="col-sm-12 col-form-label">Old Password</label>
                                            <div class="col-sm-12">  
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-password1"><i class="icon-key"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control" placeholder="Old Password" aria-label="Password" aria-describedby="basic-password" name="old_password">
                                                </div>
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="password" class="col-sm-12 col-form-label">New Password</label>
                                            <div class="col-sm-12">  
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-password1"><i class="icon-key"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control" placeholder="New Password" aria-label="Password" aria-describedby="basic-password" name="password">
                                                </div>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="cpassword" class="col-sm-12 col-form-label">Confirm Password</label>
                                            <div class="col-sm-12">  
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-password1"><i class="icon-key"></i></span>
                                                    </div>
                                                    <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-password" name="password_confirmation">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
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