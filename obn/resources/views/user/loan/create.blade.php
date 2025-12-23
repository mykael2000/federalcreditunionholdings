@extends('layouts.user.header')

@section('title', 'OBNK - Transfers - Create')
@php

$user = auth('user')->user();

@endphp
@section('content')

<!-- START: Main Content-->
<main>
<div class="container-fluid">
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">Bank Loan</h4></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Loan</li>
                    <li class="breadcrumb-item active"><a href="#">Request</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        @if($success = session('success'))
            <div class="col-md-8 offset-md-2 mt-4 alert alert-success">{{ $success }}</div>
        @endif
        <div class="col-md-8 offset-md-2 mt-4">
            <div class="card">
                <div class="card-header">                               
                    <h4 class="card-title">Enter Details Below</h4>                                
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-12">
                                <form autocomplete="OFF" method="post" action="{{ route('user.loan.store') }}">
                                    @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="account_number">Account Number</label>
                                            <input type="text" class="form-control" id="account_number" placeholder="Enter account number" name="account_number" value="{{ $user->account_number }}">
                                            @error('account_number')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="account_name">Account Name</label>
                                            <input type="text" name="account_name" id="account_name" class="form-control" placeholder="Enter account name" value="{{ $user->first_name.' '.$user->last_name }}">
                                            @error('account_name')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" value="{{ $user->email }}">
                                            @error('email')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="ssn">SSN</label>
                                            <input type="text" name="ssn" id="ssn" class="form-control" placeholder="Enter ssn">
                                            @error('ssn')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="border-bottom pb-1 mb-3">
                                        <p>Loan Details</p>
                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="amount">Amount</label>
                                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter amount">
                                            @error('amount')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="loan_duration">Loan Duration</label>
                                            <select class="form-control" id="loan_duration"  name="loan_duration">
                                                <option value="">-- Choose --</option>
                                                <option value="1 week">1 week</option>
                                                <option value="2 weeks">2 weeks</option>
                                                <option value="3 weeks">3 weeks</option>
                                                <option value="1 month">1 month</option>
                                                <option value="3 month">3 months</option>
                                                <option value="6 month">6 months</option>
                                                <option value="1 year">1 year</option>
                                            </select>
                                            @error('loan_duration')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="loan_type">Loan Type</label>
                                            <select class="form-control" id="loan_type"  name="loan_type">
                                                <option value="">-- Choose --</option>
                                                <option value="vehicle">Vehicle</option>
                                                <option value="personal">Personal</option>
                                                <option value="credit card">Credit Card</option>
                                                <option value="student">Student</option>
                                                <option value="Home">Home</option>
                                                <option value="Business">Business</option>
                                            </select>
                                            @error('loan_type')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="loan_reason">Loan Reason</label>
                                            <textarea rows="5" name="loan_reason" id="loan_reason" class="form-control" placeholder="Enter loan reason"></textarea>
                                            @error('loan_reason')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Proceed</button>

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
</main>
<!-- END: Content-->

@endsection