@extends('layouts.admin.header')

@section('title', 'Messages')

@section('css')
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css')}}"/>
@endsection

@section('content')

<!-- START: Main Content-->
<div class="contentbar" style="margin-top:8rem;">

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table dataTable table-bordered">
                            <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Subject</th>
                                    <th>From.Name</th>
                                    <th>Priority</th>
                                    <th>Recipient</th>
                                    <th>Status</th>
                                    <th>Date created</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @php
                                    $i=0;
                                @endphp

                                @foreach($messages as $message)

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->first_name.' '.$message->last_name }}</td>
                                    <td>{{ $message->priority }}</td>
                                    <td>{{ $message->recipient }}</td>
                                    <td>
                                        <span class="badge badge-primary">{{ $message->status }}</span>
                                    </td>
                                    <td>{{ date('d/m/y', strtotime($message->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-primary ">View/Reply</a>
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