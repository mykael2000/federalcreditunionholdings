@extends('layouts.user.header')

@section('title', 'OBNK - Message - Inbox ')
@php
    $newMessage = new App\Http\Controllers\User\MessageController;
@endphp
@section('content')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">

        <!-- START: Card Data-->
        <div class="row">
            @include('user.message.sidebar')
            <div class="col-12 col-lg-9 col-xl-10 mb-4 mt-3 pl-lg-0">
                <div class="card border border-left-0 h-100">
                    <div class="row m-0 border-bottom theme-border">
                        <div class="col-12 d-flex  py-2 font-weight-bold">
                            My Inbox Messages.
                        </div>
                    </div>
                    <div class="card-body p-0">

                        <div class="scrollertodo">
                            <ul class="tasks chat-menu mail-app">
                                @forelse($messages as $message)
                                    <li class="task  py-3 px-2 border-left border-primary">
                                        <div class="media mb-3 d-flex w-100">
                                            <div class="media-body align-self-center pl-2">
                                                <a href="{{ route('user.messages.view', $message->id) }}"><b class="mb-0">{{ ucwords($message->subject) }}</b><span class="ml-2 badge badge-success">{{ $newMessage->count($message->id) }}</span></a><br/>
                                                <p class="mb-0 text-muted">Priority : {{ $message->priority }}</p>
                                            </div>
                                            <div class="ml-auto mail-tools">
                                                <a href="#" data-toggle="tooltip" title="Mark as unread" data-placement="bottom"><i class="icon-eye"></i></a> 
                                            </div>
                                        </div> 
                                        <div class="d-flex align-self-center">
                                            <label class="chkbox">                                                    
                                                <b> {{ substr($message->content, 0, 100) }}.....</b>  
                                            </label>
                                            <div class="ml-auto d-flex font-weight-bold">{{ date('F j', strtotime($message->created_at)) }} at {{ date('H:i a', strtotime($message->created_at)) }}
                                            </div>
                                        </div>
                                    </li>
                                @empty

                                @endforelse
                                
                                
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->

@endsection