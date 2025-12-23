@extends('layouts.admin.header')

@section('title', 'OBNK - Transactions')

@section('css')
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
@endsection

@section('content')

<!-- START: Main Content-->
<main>
<div class="container-fluid">
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">Withdrawal Transactions</h4></div>

                <a href="{{ route('admin.transactions.transfers') }}" class="btn btn-success text-white">View Transfer Transactions</a>
                
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
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-striped table-bordered" >
                            <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Account Number</th>
                                    <th>Bank Name</th>
                                    <th>Amount</th>
                                    <th>Swift Code</th>
                                    <th>Transaction tatus</th>
                                    <th>Date created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i = 0;
                                @endphp
                                @foreach($transactions as $transaction)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $transaction->account_number }}</td>
                                    <td>{{ ucwords($transaction->bank_name) }}</td>
                                    <td>{{ $transaction->currency.number_format($transaction->amount) }}</td>
                                    <td>{{$transaction->swift_code }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ ucwords($transaction->status) }}</span>
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($transaction->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.transactions.edit-withdrawal', $transaction->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('admin.transactions.delete-withdrawal', $transaction->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                @endforeach
                                

                            </tbody>
                            
                        </table>
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
@section('js')
<script src="{{asset('dist/vendors/datatable/js/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('dist/vendors/datatable/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/jszip/jszip.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('dist/vendors/datatable/buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/dist/js/datatable.script.js')}}"></script>
@endsection