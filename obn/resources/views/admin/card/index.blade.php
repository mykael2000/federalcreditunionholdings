@extends('layouts.admin.header')

@section('title', 'OBNK CARDS')
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
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Cards</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active"><a href="#">cards</a></li>
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
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                               
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Account Name</th>
                                                <th>Email</th>
                                                <th>Card Number</th>
                                                <th>Account Number</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($cards as $card)
                                            <tr>
                                                <td>{{ $card->first_name.' '.$card->last_name }}</td>
                                                <td>{{ $card->email }}</td>
                                                <td>@if(empty($card->number)) --- @else {{ $card->number }}@endif</td>
                                                <td>{{ $card->account_number }}</td>
                                                <td><span class="badge badge-info badge-pill">{{ $card->status }}</span></td>
                                                
                                                <td>{{ date('d/m/Y', strtotime($card->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.cards.show', $card->id) }}" class="btn btn-primary btn-sm">View/approve</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Account Name</th>
                                                <th>Email</th>
                                                <th>Card Number</th>
                                                <th>Account Number</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
                <!-- END: Card DATA-->
                <div class="mb-5" style="margin-top:10rem"></div>
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