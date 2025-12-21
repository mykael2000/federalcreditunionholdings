<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    public function index() {

        $user = auth('user')->user();

        $deposits = DB::table('deposits')->where('user_id', $user->id)->count();
        $withdrawals = DB::table('withdrawals')->where('user_id', $user->id)->count();
        $transfers = DB::table('transfers')->where('user_id', $user->id)->count();
        

        $total = $deposits + $withdrawals + $transfers;

        $loanTotal = DB::table('loans')->where('user_id', $user->id)->sum('amount');

        $recent_transfers = DB::table('transfers')->where('user_id', $user->id)->orderBy('id', 'DESC')->limit(4)->get();

        $totalAccounts = DB::table('user_account')->where("user_id", $user->id)->count();
 		
        return view('user.index', [
            'total' => $total,
            'transfers' => $transfers,
            'loanTotal' => $loanTotal,
            'recent_transfers' => $recent_transfers,
            'transactions'    => DB::table('transactions')->where('user_id', $user->id)->orderBy('id', 'DESC')->limit(4)->get(),
            'totalAccounts' => $totalAccounts
			
        ]);

    }
}
