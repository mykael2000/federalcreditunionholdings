@extends('layouts.admin.header')

@section('title', 'OBNK - Deposit')

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
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Deposits</h4></div>
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
                                        <th>Depositor</th>
                                        <th>Account Number</th>
                                        <th>Deposit Mode</th>
                                        <th>Amount</th>
                                        <th>Date created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                @php
                                    $i = 0;
                                @endphp
                                @foreach($deposits as $deposit)
                                    <tr>

                                        <td>{{ ++$i }}</td>
                                        <td>{{ $deposit->first_name.' '.$deposit->last_name }}</td>
                                        <td>{{ $deposit->account_number }}</td>
                                        <td>@if($deposit->deposit_mode == 'via BTC') via BTC @else via Cheque @endif</td>
                                        <td>{{ $deposit->currency.number_format($deposit->amount) }}</td>
                                        <td>
                                            {{ date('d/m/Y', strtotime($deposit->created_at)) }}
                                        </td>
                                        <td>
                                            <a href="#">View Upload/Update</a>
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
        <div class="mb-5" style="margin-top:12rem"></div>
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