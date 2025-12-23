@extends('layouts.admin.header')

@section('title', 'OBNK Cards Management')


@section('content')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Cards</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">cards</li>
                        <li class="breadcrumb-item active"><a href="#">Approve</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <form action="{{ route('admin.cards.store') }}" method="post">
        @csrf 
        <!-- START: Card Data-->
        <div class="row">

        @if($success = session('success'))
            <div class="col-12 col-lg-12 mt-5">
                <div class="alert alert-success">{{ $success }}</div>
            </div>
        @endif

        
            <div class="col-12 col-lg-8 offset-lg-2 mt-5">
                <div class="card">
                    <div class="card-header">                               
                        <h4 class="card-title">Card Information</h4>                                
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">
                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="card_number">Card Number</label>
                                                <div class="input-group  mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="icon-credit-card"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Card number" name="number" value="{{ $card->number }}">
                                                    
                                                </div>
                                                @error('card_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="expiry_date">Expiry Date</label>
                                                <div class="input-group  mb-3">

                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="icon-calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" name="expiry_date" value="{{ date('Y-m-d', strtotime($card->expiry_date)) }}">
                                                    
                                                </div>
                                                @error('expiry_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="csv">Card CSV</label>
                                            <div class="input-group  mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-transparent border-right-0" id="basic-addon1"><i class="icon-credit-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Ex 123" name="csv" value="{{ $card->csv }}">
                                                
                                            </div>
                                            @error('csv')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">

                                            <div class="col-md-12">
                                                
                                                <label for="status">Status</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-transparent border-right-0" id="basic-email"><i class="icon-check"></i></span>
                                                    </div>
                                                    <select class="form-control" name="status">
                                                        <option value="approved" @if($card->status == 'approved') selected @endif>Approved</option>
                                                        <option value="processing" @if($card->status == 'processing') selected @endif>Processing</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>


                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="hidden" name="card_id" value="{{ $card->id }}">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
        </form>
        <!-- END: Card DATA-->
        <div class="mb-5" style="margin-top:13rem"></div>
    </div>
</main>
<!-- END: Content-->

@endsection