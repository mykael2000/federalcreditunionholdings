@extends('layouts.user.header')

@section('title', 'Accounts')
@section('css')
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
@endsection
@section('content')

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Accounts</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('user.accounts.create') }}" class="btn btn-primary-rgba"><i class="feather icon-user-plus mr-2"></i>Add Account</a>
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->

<!-- START: Main Content-->
<div class="contentbar">

    <!-- START: Card Data-->
    <div class="row">
        @if($success = session('success'))
            <div class="col-12 col-lg-12 mt-1">
                <div class="alert alert-success">{{ $success }}</div>
            </div>
        @endif
        <div class="col-12 mt-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-bordered" >
                            <thead>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Account Type</th>
                                    <th>Age</th>
                                    <th>Date created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $user)
                                <tr>
                                    <td>{{ ucwords($user->first_name.' '.$user->last_name) }}</td>
                                    <td>{{ $user->account_number }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td><span class="badge badge-info badge-pill">{{ $user->account_type }}</span></td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                                    <td><a href="{{ route('user.login-as', $user->id) }}" class="btn btn-success mt-1">Login As</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Account Type</th>
                                    <th>Age</th>
                                    <th>Date Registered</th>
                                </tr>
                            </tfoot>
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