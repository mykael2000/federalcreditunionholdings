@extends('layouts.admin.header')

@section('title', ' Dashboard')

@section('content')

<!-- START: Main Content-->
<div class="contentbar" style="margin-top:8rem;">
	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 col-sm-6 col-xl-3 mt-3">
			<div class="card">
				<div class="card-body">
					<img src="dist/images/traffic.png" alt="traffic" class="float-right" />
					<h6 class="card-title font-weight-bold">Total Users</h6>
					<h6 class="card-subtitle mb-2 text-muted">Active</h6>
					<h2>{{ number_format($users) }}</h2>
					<span class="text-success"><a href="{{ route('admin.users.index') }}" class="text-info">Click to view all</a></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-3 mt-3">
			<div class="card">
				<div class="card-body">
					<img src="dist/images/wallet.png" alt="cart" class="float-right" />
					<h6 class="card-title font-weight-bold">All Transactions</h6>
					<h6 class="card-subtitle mb-2 text-muted">Debit + credit</h6>
					<h2>{{ number_format($transactions) }}</h2>
					<span class="text-success"><a href="{{ route('admin.transactions.show') }}" class="text-info">Click to view all</a></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-3 mt-3">
			<div class="card">
				<div class="card-body">
					<img src="dist/images/money.png" alt="money" class="float-right" />
					<h6 class="card-title font-weight-bold">Debit Transactions</h6>
					<h6 class="card-subtitle mb-2 text-muted">Last Months</h6>
					<h2>{{ number_format($debits) }}</h2>
					<span class="text-success"><a href="{{ route('admin.transactions.show') }}" class="text-info">Click to view all</a></span>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-6 col-xl-3 mt-3">
			<div class="card">
				<div class="card-body">
					<img src="dist/images/wallet.png" alt="wallet" class="float-right" />
					<h6 class="card-title font-weight-bold">Credit Transactions</h6>
					<h6 class="card-subtitle mb-2 text-muted">Last Months</h6>
					<h2>{{ number_format($credits) }}</h2>
					<span class="text-success"><a href="{{ route('admin.transactions.show') }}" class="text-info">Click to view all</a></span>
				</div>
			</div>
		</div>
		
	</div>
	<div class="row mt-5">
		<div class="col-md-10 offset-md-1">
			@if($success = session('success'))
				<div class="alert alert-success">{{ $success }}</div>
			@endif
			<div class="card m-b-30">
				<div class="card-header">
					<h4>Debit/Credit user account</h4>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.transactions.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label>Amount</label>
							<input type="text" name="amount" class="form-control" placeholder="0.0">
							@error('amount')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						
						<div class="form-group">
							<label>To/From</label>
							<input type="text" name="to_from" class="form-control" placeholder="Enter transaction to or from details">
							@error('to_or_from')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						
						<div class="form-group">
							<label>Transaction type</label>
							<select class="form-control" name="type">
								<option value="">-- Choose --</option>
								<option value="debit">Debit</option>
								<option value="credit">Credit</option>
							</select>
							@error('transaction_type')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
                      
                      <div class="form-group">
							<label>Transaction status</label>
							<select class="form-control" name="status">
								<option value="">-- Choose --</option>
								<option value="pending">Pending</option>
								<option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
							</select>
							@error('transaction_status')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						
						<div class="form-group">
							<label>Select Account</label>
							<select class="form-control" name="account">
								<option value="">-- Choose --</option>
								@foreach($accounts as $user)
								<option value="{{ $user->id }}">{{ $user->first_name.' '.$user->last_name }}</option>
								@endforeach
							</select>
							@error('account')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						
						<div class="form-group">
							<label>Enter Transaction Description</label>
							<textarea class="form-control" placeholder="Enter description...." name="description"></textarea>
							@error('description')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						
						<div class="form-group">
							<label>Date created</label>
							<input type="date" class="form-control" name="created_at">
							@error('created_at')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-sm">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Card DATA-->
</div>
 <!-- END: Content-->

@endsection
