@extends('layouts.admin.header')

@section('title', 'OBNK Transfers Management')

@section('content')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Transfers</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Transfer</li>
                        <li class="breadcrumb-item active"><a href="#">management</a></li>
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
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">

                                    <form class="mt-5" action="{{ route('admin.transactions.store-transfer') }}" method="post">
                                    @csrf
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text"  name="amount" placeholder="00.0" class="form-control" value="{{ $transfer->amount }}">
                                            @error('amount')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" name="account_number" value="{{ $transfer->account_number }}" class="form-control" placeholder="Enter">
                                            @error('account_number')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" name="account_name" value="{{ $transfer->account_name }}" class="form-control" placeholder="Enter">
                                            @error('account_name')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input type="text" name="bank_name" value="{{ $transfer->bank_name }}" class="form-control" placeholder="Enter">
                                            @error('bank_name')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Swift code</label>
                                            <input type="text" name="swift_code" value="{{ $transfer->swift_code }}" class="form-control" placeholder="Enter">
                                            @error('swift_code')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Date Created</label>
                                            <input type="date" name="created_at" value="{{ date('Y-m-d',strtotime($transfer->created_at ))}}" class="form-control" placeholder="Enter">
                                            @error('created_at')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="approved" @if($transfer->status == 'approved') selected @endif>Approved</option>
                                                <option value="processing" @if($transfer->status == 'processing') selected @endif>Processing</option>
                                                <option value="declined" @if($transfer->status == 'declined') selected @endif>Decline</option>
                                            </select>
                                            @error('status')
                                                <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="transfer_id" value="{{ $transfer->id }}">
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

        <div class="mb-5" style="margin-top:12rem"></div>
    </div>
</main>
<!-- END: Content-->


@endsection