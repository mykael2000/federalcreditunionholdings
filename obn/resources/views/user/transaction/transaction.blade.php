@extends('layouts.user.header')

@section('title', 'Transactions')

@section('css')
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
@endsection

@section('content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">All Transactions</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="/user/transfers/create" class="btn btn-primary-rgba"><i class="feather icon-eye mr-2"></i> Transfer funds</a>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->

<!-- START: Main Content-->
<div class="contentbar">

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-bordered" >
                            <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>To/From</th>
									<th>Description</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $i = 0;
                                @endphp
                                @foreach($transactions as $transaction)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ ucwords($transaction->type) }}</td>
                                    <td>{{ $transaction->currency.number_format($transaction->amount) }}</td>
                                    <td>
                                        {{ $transaction->to_from }}
                                    </td>
									<td>
                                        {{ $transaction->description }}
                                    </td>
                                    <td><span class="badge badge-info">{{ $transaction->status }}</span></td>
                                    <td>{{ date('D j, F Y', strtotime($transaction->created_at)) }}</td>
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
</div>
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