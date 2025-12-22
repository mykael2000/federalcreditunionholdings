@extends('layouts.user.header')

@section('title', 'OBNK - Cards')

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
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Card Applications</h4></div>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    @if($success = session('success'))
                        <div class="alert alert-success col-md-12 mt-3">{{ $success }}</div>
                    @endif
                    <div class="col-md-8 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>S/n</th>
                                                <th>Card</th>
                                                <th>Status</th>
                                                <th>Date applied</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                            @foreach($cards as $card)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $card->type }}</td>
                                                <td>
                                                    <span class="badge badge-primary">{{ $card->status }}</span>
                                                </td>
                                                <td>{{ date('d/m/Y', strtotime($card->created_at)) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>     
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('user.card.store') }}" method="post">
                                @csrf
                                    <div class="form-group">
                                        <label for="card_type">Card Type</label>
                                        <select class="form-control" name="card_type">
                                            <option value="">-- Choose --</option>
                                            <option value="credit master card">Credit Master Card</option>
                                            <option value="debit master card">Credit Master Card</option>
                                            <option value="credit visa card">Credit Visa Card</option>
                                            <option value="debit visa card">Debit Visa Card</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Apply</button>
                                    </div>
                                </form>
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