<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendTransactionAlert;
use Carbon\Carbon;
class TransactionController extends Controller
{
    public function deposit() {

        $deposits = DB::table('deposits')->join('users', 'users.id', '=', 'deposits.user_id')
                                         ->select('users.first_name', 'users.last_name','users.currency', 'deposits.*', 'users.account_number')->get();
       

        return view('admin.transaction.deposit', [
            'deposits' => $deposits,
           
        ]);

    }

    public function withdrawals() {

        $transactions = DB::table('withdrawals')->join('users', 'users.id', '=', 'withdrawals.user_id')
                                         ->select('users.first_name', 'users.last_name','users.currency', 'withdrawals.*')->get();
        

        return view('admin.transaction.withdrawals', [

            'transactions' => $transactions,
           

        ]);

    }

    public function transfers() {

        $transactions = DB::table('transfers')->join('users', 'users.id', '=', 'transfers.user_id')
                                         ->select('users.first_name', 'users.last_name','users.currency', 'transfers.*')->get();

        $current = DB::table('general_settings')->where('id', 1)->first();

        return view('admin.transaction.transfers', [

            'transactions' => $transactions,
            'current' => $current

        ]);

    }

    public function editWithdrawal($id) {

        return view('admin.transaction.edit-withdrawal', [

            'withdrawal' => DB::table('withdrawals')->where('id', $id)->first()

        ]);
        
    }

    public function editTransfer($id) {

        return view('admin.transaction.edit-transfer', [

            'transfer' => DB::table('transfers')->where('id', $id)->first()

        ]);

    }

    public function storeWithdrawal() {
        
        request()->validate( [

            'amount'        => 'required|string',
            'account_name'  => 'required|string',
            'account_number'=> 'required|string',
            'bank_name'     => 'required|string',
            'swift_code'    => 'required|string',
            'created_at'    => 'required',
            'status'        => 'required'
        ]);

        DB::table('withdrawals')->where('id', request('withdrawal_id'))->update([

            'amount'    => request('amount'),
            'account_name' => request('account_name'),
            'account_number' => request('account_number'),
            'bank_name'    => request('bank_name'),
            'swift_code'   => request('swift_code'),
            'status'       => request('status'),
            'created_at'   => request('created_at'),

        ]);

        return redirect()->back()->with(['success'=>'Successfully saved changes']);
    }

    public function storeTransfers() {
        
        request()->validate( [

            'amount'        => 'required|string',
            'account_name'  => 'required|string',
            'account_number'=> 'required|string',
            'bank_name'     => 'required|string',
            'swift_code'    => 'required|string',
            'created_at'    => 'required',
            'status'        => 'required'
        ]);
		
		$tranx = DB::table('transfers')->where('id', request('transfer_id'))->first();
        DB::table('transfers')->where('id', request('transfer_id'))->update([

            'amount'    => request('amount'),
            'account_name' => request('account_name'),
            'account_number' => request('account_number'),
            'bank_name'    => request('bank_name'),
            'swift_code'   => request('swift_code'),
            'status'       => request('status'),
            'created_at'   => request('created_at'),

        ]);
		
		
		if($tranx->status == 'processing' && request('status') == 'approved') {
			
			$user = DB::table('users')->where('id', $tranx->user_id)->first();
		
			$data = [
				"type" => 'Debit',
				"amount" => request('amount'),
				'user' => $user,
				'subject' =>  "RFBANK Debit Alert",
				'from' => 'RFBANK Transfer Transaction',
				'description' => request('account_name').'/'.request('bank_name').'/'.request('account_number').'/'.request('swift_code'),
				'date' => request('created_at')
			];

			Mail::to($user->email)->send(new SendTransactionAlert($data));
			
			DB::table('users')->where('id', $user->id)->update([
				'account_balance' => DB::raw('account_balance - '.request('amount')),
			]);
		
		}

        return redirect()->back()->with(['success'=>'Successfully saved changes']);
    }

    public function deleteWithdrawal($id) {

        DB::table('withdrawals')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Successfully deleted transaction']);

    }

    public function deleteTransfer($id) {

        DB::table('transfers')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Successfully deleted transaction']);

    }
	
	public function store() {
		
		request()->validate([
			'amount' => 'required',
			'to_from'=> 'required',
			'description' => 'required',
			'account'	  => 'required',
			'type'		  => 'required',
            'status' => 'required'
			
		]);
		
		if(request('type') == 'debit') {
			DB::table('users')->where('id', request('account'))->update([
				'account_balance' => DB::raw('account_balance - '.request('amount')),
			]);
		} elseif(request('type') == 'credit'){
			DB::table('users')->where('id', request('account'))->update([
				'account_balance' => DB::raw('account_balance + '.request('amount')),
			]);
		}
		
		$records = request()->all();
		
		unset($records['_token'], $records['account']);
		
		$records['user_id'] = request('account'); 
		
		DB::table('transactions')->insert($records);
		
		$user = DB::table('users')->where('id', request('account'))->first();
		
		$data = [
			"type" => request('type'),
			"amount" => request('amount'),
			'user' => $user,
			'subject' => request('type') == 'credit' ? "Federal First Capital Union Credit Alert" : "Federal First Capital Union Debit Alert",
			'from' => request('to_from'),
			'description' => request('description'),
			'date' => request('created_at'),
          	'status'=> request('status')
		];
		
		Mail::to($user->email)->send(new SendTransactionAlert($data));
		
		return redirect()->back()->with(['success'=>'Successfully '.request('type').'ed account']);
	}
	
	public function show(){
		
		$transactions = DB::table('transactions')->join('users', 'users.id', '=', 'transactions.user_id')
                                         ->select('users.first_name', 'users.last_name','users.currency', 'transactions.*')->orderBy('id', 'DESC')->get();
		
		
		return view('admin.transaction.show', [
				'transactions' => $transactions,
				
		]);
	}
	
	public function deleteTrans($id) {

        DB::table('transactions')->where('id', $id)->delete();

        return redirect()->back()->with(['success'=>'Successfully deleted transaction']);

    }

}
