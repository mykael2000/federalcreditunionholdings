<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LoanController extends Controller
{
    public function index() {

        $loans = DB::table('loans')->join('users', 'users.id', '=', 'loans.user_id')->select('users.currency', 'loans.*')->get();
        

        return view('admin.loan.index', [
            'loans' => $loans,
            
        ]);

    }

    public function update($id) {

        DB::table('loans')->where('id', $id)->update(['status'=>request('sta')]);

        return redirect()->back()->with(['success'=>'Loan request has been successfully '.request('sta')]);
    }
}
