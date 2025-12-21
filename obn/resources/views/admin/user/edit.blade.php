@extends('layouts.admin.header')

@section('title', 'Users Management')


@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">All Users</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit user</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary"><i class="feather icon-users mr-2"></i>Users</a>
                <a href="{{ route('admin.users.create') }}?id={{ $user->id }}" class="btn btn-primary-rgba"><i class="feather icon-user-plus mr-2"></i>Add Joint Account</a>
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
        <div class="col-12 col-lg-12 mt-1">
            <div class="alert alert-success">{{ $success }}</div>
        </div>
    @endif

        <div class="col-12 col-lg-7 mt-1">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title">Account Information</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">

                                <form action="{{ route('admin.users.account-setting.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="first_name">First name</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{ $user->first_name }}">

                                            </div>
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="last_name">Last name</label>
                                            <div class="input-group  mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ $user->last_name }}">

                                            </div>
                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <div class="input-group  mb-3">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Username" value="{{ $user->username }}" name="username">

                                        </div>
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">

                                            <label for="email">Email</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-email"><i class="feather icon-mail"></i></span>
                                                </div>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}">
                                            </div>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <div class="col-md-6">

                                            <label for="phone">Phone</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-email"><i class="feather icon-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="{{ $user->phone }}">

                                            </div>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-8">
                                            <label for="address">Home address</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter home address" name="address" value="{{ $user->address }}">

                                            </div>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="age">AGE</label>

                                            <div class="input-group mb-3">

                                                <input type="number" class="form-control" name="age" value="{{ $user->age }}">

                                            </div>
                                            @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="divider">
                                        <h6 class="pb-2 border-bottom">Bank Information</h6>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <label for="account_number">Account number</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-tag"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter account number" name="account_number" value="{{ $user->account_number }}">

                                            </div>
                                            @error('account_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="account_balance">Account Balance</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter account balance" name="account_balance" value="{{ $user->account_balance }}">

                                            </div>
                                            @error('account_balance')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <label for="account_type">Account Type</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-more-horizontal"></i></span>
                                                </div>
                                                <select id="account_type" name="account_type" class="form-control">
                                                    <option value="">-- Choose --</option>
                                                    <option @if($user->account_type == 'Savings Account') selected @endif>Savings Account</option>
                                                    <option @if($user->account_type == 'Fixed Deposit Account') selected @endif>Fixed Deposit Account</option>
                                                    <option @if($user->account_type == 'Equity Account') selected @endif>Equity Account</option>
                                                    <option @if($user->account_type == 'Offshore Account') selected @endif>Offshore Account</option>
                                                    <option @if($user->account_type == 'Checking Account') selected @endif>Checking Account</option>
                                                    <option @if($user->account_type == 'Domiciliary Account') selected @endif>Domiciliary Account</option>
                                                </select>

                                            </div>
                                            @error('account_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="transfer_mode">Transfer Mode</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-send"></i></span>
                                                </div>
                                                <select id="transfer_mode" name="transfer_mode" class="form-control">
                                                    <option value="request-otp" @if($user->transfer_mode =='request-otp') selected @endif>Request Otp from user</option>
                                                    <option value="request-ici" @if($user->transfer_mode =='request-ici') selected @endif>Request IMF, COT, IPN from user</option>

                                                </select>

                                            </div>
                                            @error('transfer_mode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="row">


                                        <div class="col-md-6">
                                            <label for="account_status">Account Status</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-user"></i></span>
                                                </div>
                                                <select id="account_status" name="account_status" class="form-control">
                                                    <option @if($user->account_status == 'Verified') selected @endif>Verified</option>
                                                    <option @if($user->account_status == 'Unverified') selected @endif>Unverified</option>
                                                    <option @if($user->account_status == 'Dormant') selected @endif>Dormant</option>
                                                </select>

                                            </div>
                                            @error('account_status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="transfer_status">Transfer Status</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-send"></i></span>
                                                </div>
                                                <select id="transfer_status" name="transfer_status" class="form-control">
                                                    <option value="activated" @if($user->transfer_status =='activated') selected @endif>Activated</option>
                                                    <option value="deactivated" @if($user->transfer_status =='deactivated') selected @endif>Deactivated</option>

                                                </select>

                                            </div>
                                            @error('transfer_status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="row">


                                        <div class="col-md-12">
                                            <label for="created_at">Date Registered</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-calendar"></i></span>
                                                </div>
                                                <input type="date"  id="created_at" name="created_at" class="form-control" value="{{ date('Y-m-d', strtotime($user->created_at)) }}">

                                            </div>
                                            @error('created_at')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="user_passport">User Passport</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <input type="file" class="form-control" name="passport">

                                            </div>
                                            @error('passport')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @if(empty($user->profile))
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Placeholder_no_text.svg/1200px-Placeholder_no_text.svg.png" class="img-thumbnail w-100">
                                                @else
                                                <img src="https://federalfirstcapitalunion.com/obn/storage/app/public{{ $user->profile }}" class="img-thumbnail w-100">
                                                @endif
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-6">
                                            <label for="first_name">Currency</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <select class="form-control" name="currency">
                                                    @foreach($currencies as $key => $currency)
                                                    <option value="{{ $currency->symbol }}" @if($user->currency == $currency->symbol) selected @endif>{{ $key }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('currency')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}

                                        <div class="col-md-6">
                                            <label for="first_name">Tax status</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <select class="form-control" name="tax_status">

                                                    <option value="active" @if($user->tax_status =='active') selected @endif>Activate</option>
                                                    <option value="inactive" @if($user->tax_status =='inactive') selected @endif>Deactivate</option>

                                                </select>
                                            </div>
                                            @error('tax_status')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                      {{-- <div class="col-md-6">
                                            <label for="first_name">Transfer OTP</label>
                                            <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="feather icon-credit-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter users OTP" name="otp" value="{{ $user->otp }}">

                                            </div>
                                            @error('otp')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}

                                    </div>

                                    <div class="form-group mt-3">
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 mt-1">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change password</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form method="post" action="{{ route('admin.users.account-setting.change-password') }}">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    @csrf

                                    <div class="row">
                                        <label for="password" class="col-sm-12 col-form-label">New Password</label>
                                        <div class="col-sm-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password1"><i class="feather icon-lock"></i></span>
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
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-password1"><i class="feather icon-lock"></i></span>
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

            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Task Notification</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('admin.user.account-setting.send-notification') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Enter notification details</label>
                                <textarea required rows="10" class="form-control" name="message" placeholder="Write here..."></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary">Send notification</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- END: Card DATA-->
</div>
<!-- END: Content-->

@endsection
