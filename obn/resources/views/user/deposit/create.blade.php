@extends('layouts.user.header')

@section('title', 'OBNK DEPOSIT')

@section('content')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Deposit</h4></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a href="#">Deposit</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">
            @if($success = session('success'))
            <div class="col-md-8 offset-md-2 mt-4 alert alert-success">{{ $success }}</div>
            @endif
            <div class="col-md-8 offset-md-2 mt-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">                                           
                                <div class="col-12">

                                    <nav>
                                        <ul class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deposit Via BTC</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Deposit Via Check</a>
                                            </li>
                                           
                                        </ul>
                                    </nav>

                                    <div class="tab-content" id="nav-tabContent">

                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                            <form class="mt-5" action="{{ route('user.deposit.via-btc') }}" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label>Copy the BTC wallet address below and send the amount you want to deposit worth of BTC</label>
                                                    <input type="text" readonly name="btc" value="PNhuEuryCc18OW36FCapV6dR6vh8cTfgrQjWy" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter amount In BTC</label>
                                                    <input type="text" name="btc_amount" value="{{ old('btc_amount') }}" class="form-control" placeholder="00.0">
                                                    @error('btc_amount')
                                                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Request Review/Comfirmation</button>
                                                </div>


                                            </form>
                                            
                                        </div>

                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <form class="mt-5" autocomplete="off" action="{{ route('user.deposit.via-check') }}" enctype="multipart/form-data" method="post">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="check">Upload check</label>
                                                    <input type="file" name="check_upload" class="form-control">
                                                    @error('check_upload')
                                                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="amount">Amount</label>
                                                    <input type="text" name="amount" class="form-control" placeholder="00.0">
                                                    @error('amount')
                                                        <span class="text-danger" style="font-size:12px;">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <button class="btn btn-primary">Submit</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->

        <div class="mb-5" style="margin-top:23rem"></div>
    </div>
</main>
<!-- END: Content-->

@endsection