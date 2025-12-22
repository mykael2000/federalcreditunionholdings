<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TransactionController extends Controller
{
    public function withdrawals() {

        $withdrawals = DB::table('withdrawals')->join('users', 'users.id', '=', 'withdrawals.user_id')
			->select('users.currency', 'withdrawals.*')->where('user_id', auth('user')->user()->id)->get();
		
        return view('user.transaction.index', [
            'withdrawals'=> $withdrawals,
			
        ]);

    }

    public function deposits() {

        $deposits = DB::table('deposits')->join('users', 'users.id', '=', 'deposits.user_id')
			->select('users.currency', 'deposits.*')->where('user_id', auth('user')->user()->id)->get();
		
        return view('user.transaction.deposit', [

            'deposits' => $deposits,
			

        ]);

    }
	
	public function transactions(){
		
		$transactions = DB::table('transactions')->join('users', 'users.id', '=', 'transactions.user_id')
			->select('users.currency', 'transactions.*')->where('user_id', auth('user')->user()->id)->orderBy('id', 'DESC')->get();
		
		
		return view('user.transaction.transaction', [
				'transactions' => $transactions,
				
		]);
	}
}
