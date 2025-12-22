@extends('layouts.user.header')

@section('title', 'OBNK - Message - View/Reply ')
@section('css')
<style>
.comment-thread {
    width: 700px;
    max-width: 100%;
    padding: 0 30px;
    background-color: #fff;
    border: 1px solid transparent; /* Removes margin collapse */
}
.m-0 {
    margin: 0;
}
/* Comment */

.comment {
    position: relative;
    margin: 20px auto;
}
.comment-heading {
    display: flex;
    align-items: center;
    height: 50px;
    font-size: 14px;
}
.comment-voting {
    width: 20px;
    height: 32px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 4px;
}
.comment-voting button {
    display: block;
    width: 100%;
    height: 50%;
    padding: 0;
    border: 0;
    font-size: 10px;
}
.comment-info {
    color: rgba(0, 0, 0, 0.5);
    margin-left: 1px;
}
.comment-author {
    color: rgba(0, 0, 0, 0.85);
    font-weight: bold;
    text-decoration: none;
}
.comment-author:hover {
    text-decoration: underline;
}
.replies {
    margin-left: 20px;
}
</style>
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
                            Message Priority:- {{ $messages[0]->priority }}
                        </div>
                    </div>
                    <div class="card-body">

                        <h4 class="pb-3">Subject: {{ $messages[0]->subject }}</h4>
                        <div class="comment-thread">
                            <!-- Comment 1 start -->
                            <div class="comment" id="comment-1">
                                <div class="comment-body">
                                    <p>
                                        {{ $messages[0]->message }}
                                    </p>
                                </div>

                                <div class="replies">

                                  @foreach($messages as $message)
                                    <!-- Comment 2 start -->
                                    <div class="comment" id="comment-2">
                                        <div class="comment-heading">
                                            <div class="comment-info">
                                               @if($message->replied_by == auth('user')->user()->id)
                                                <a href="#" class="comment-author">{{ auth('user')->user()->username }}</a>
                                               @else
                                               <a href="#" class="comment-author">Admin</a>
                                               @endif
                                                <p class="m-0">
                                                    {{ date('d', strtotime($message->replied_at) )}} days ago
                                                </p>
                                            </div>
                                        </div>
                                        <div class="comment-body">
                                            <p>
                                                {{ $message->content }}
                                            </p>
                                        </div>
                                    </div>
                                  @endforeach

                                    <!-- Comment 2 end -->

                                </div>
                            </div>
                            <!-- Comment 1 end -->
                        </div>

                        <form method="post" action="{{ route('user.messages.reply', $messages[0]->id) }}">
                            @csrf
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="2" placeholder="Reply message here...." required></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm">Reply</a>
                        </form>

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
<!-- START: Page Vendor JS-->
<script src="{{asset('dist/vendors/quill/quill.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- START: Page Script JS-->
<script src="{{asset('dist/js/mail.script.js')}}"></script>
<!-- END: Page Script JS-->
@endsection