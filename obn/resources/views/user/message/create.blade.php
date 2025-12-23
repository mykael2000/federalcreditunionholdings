@extends('layouts.user.header')

@section('title', 'OBNK - Message - Create ')

@section('css')
<!-- START: Page CSS-->
<link rel="stylesheet" href="{{asset('dist/vendors/quill/quill.snow.css')}}" />
<!-- END: Page CSS-->
@endsection

@section('content')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">

        <!-- START: Card Data-->
        <div class="row">
            @if($success = session('success'))
                <div class="col-12 mb-2 mt-3">
                    <div class="alert alert-success">{{ $success }}</div>
                </div>
            @endif
            @include('user.message.sidebar')
            <div class="col-12 col-lg-9 col-xl-10 mb-4 mt-3 pl-lg-0">
                <div class="card border border-left-0 h-100">
                    <div class="row m-0 border-bottom theme-border">
                        <div class="col-12 d-flex  py-2 font-weight-bold">
                            Compose Message.
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.message.store') }}">
                            @csrf
                            <div class="form-group">
                                <select name="to" class="form-control" placeholder="To.">
                                    <option value="">Select Recipient.</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Accountant">Accountant</option>
                                    <option value="Support Team">Support Team</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject." name="subject">
                            </div>

                            <div class="form-group">
                                <select name="priority" class="form-control" placeholder="To.">
                                    <option value="">Select Priority.</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">low</option>
                                    <option value="high">High</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <textarea name="message" class="form-control height-350" placeholder="Compose message here...."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Send</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
    <!-- END: Content-->

@endsection

@section('js')
<!-- START: Page Vendor JS-->
<script src="{{asset('dist/vendors/quill/quill.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- START: Page Script JS-->
<script src="{{asset('dist/js/mail.script.js')}}"></script>
<!-- END: Page Script JS-->
@endsection