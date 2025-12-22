@extends('layouts.user.header')

@section('title', 'Transfer Fund')

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
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Transfers</h4></div>

                            <a href="{{ route('user.transfer.create') }}" class="btn btn-primary text-white">Make Transfer</a>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>S/n</th>
                                                <th>Beneficiary</th>
                                                <th>Account Number</th>
                                                <th>Bank Name</th>
                                                <th>Amount</th>
                                                <th>Swift Code</th>
                                                <th>Transfers status</th>
                                                <th>Date created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                              $i = 0;
                                            @endphp
                                            @foreach($transfers as $transfer)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ ucwords($transfer->account_name) }}</td>
                                                <td>{{ $transfer->account_number }}</td>
                                                <td>{{ ucwords($transfer->bank_name) }}</td>
                                                <td>{{ $transfer->currency.number_format($transfer->amount) }}</td>
                                                <td>{{ $transfer->swift_code }}</td>
                                                <td>
                                                    <span class="badge badge-primary">{{ ucwords($transfer->status) }}</span>
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($transfer->created_at)) }}</td>
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