<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index() {

        $users = DB::table('users')->count();
		
		$accounts = DB::table('users')->get();

        return view('admin.index', [
            'users' => $users,
            'debits' => DB::table('transactions')->where('type', 'debit')->count(),
            'credits'=> DB::table('transactions')->where('type', 'credit')->count(),
			'accounts' => $accounts,
            'transactions' => DB::table('transactions')->count()
        ]);

    }
}
