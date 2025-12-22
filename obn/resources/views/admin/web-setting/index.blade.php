@extends('layouts.admin.header')

@section('title', 'OBNK Website Management')


@section('content')


<!-- START: Main Content-->
<main>
            <div class="container-fluid">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Account Settings</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Account</li>
                                <li class="breadcrumb-item active"><a href="#">Settings</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">

                @if($success = session('success'))
                    <div class="col-12 col-lg-12 mt-5">
                        <div class="alert alert-success">{{ $success }}</div>
                    </div>
                @endif

                    <div class="col-12 col-lg-6 offset-lg-3 mt-5">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">                                           
                                        <div class="col-12">
                                            <form action="{{ route('admin.web-settings.store') }}" method="post">
                                                @csrf 
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <label for="first_name">Currency</label>
                                                        <div class="input-group  mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="icon-credit-card"></i></span>
                                                            </div>
                                                            <select class="form-control" name="currency">
                                                                @foreach($currencies as $key => $currency)
                                                                <option value="{{ $currency->symbol }}" @if(!empty($current_currency) && $current_currency->currency == $currency->symbol) selected @endif>{{ $key }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('currency')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    
                                                </div>


                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                <div class="mb-5" style="margin-top:18rem"></div>
            </div>
        </main>
        <!-- END: Content-->

@endsection
