<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\OtpController;

use Carbon\Carbon;
use DB;

class LoanController extends Controller
{
    public function index() {

        $loans = DB::table('loans')->join('users', 'users.id', '=', 'loans.user_id')
			->select('users.currency', 'loans.*')->where('user_id', auth('user')->user()->id)->orderBy('id', 'desc')->get();
 		
        return view('user.loan.index', [

            'loans' => $loans,
			

        ]);

    }

    public function create() {

        return view('user.loan.create');

    }

    public function store() {

        request()->validate([

            'account_name' => 'required|string',
            'account_number'=> 'required|numeric',
            'email'         => 'required|email',
            'ssn'       => 'required',
            'amount'   => 'required',
            'loan_duration' => 'required|string',
            'loan_type' => 'required',
            'loan_reason' => 'required'

        ]);

        $user = auth('user')->user();

        OtpController::sendOtpViaEmail($user, 'Loan request');

        session(['owner'=>request()->all()]);

        return redirect()->route('user.loan.verification');

    }

    public function verification () {

        if(empty(session('owner'))) {
            return redirect()->route('user.loan.create');
        }

        return view('user.loan.verification');
    }

    public function verify(Request $request) {

        if(empty(session('owner'))) {
            return redirect()->route('user.loan.create');
        }

        $user = auth('user')->user();

        $now = Carbon::now();

        $beneficiary = session('owner');
        session()->forget('owner');


        OtpController::verifyTransOtp($request);


        DB::table('loans')->insert([

            'user_id' => $user->id,
            'amount'    => $beneficiary['amount'],
            'account_name' => $beneficiary['account_name'],
            'account_number' => $beneficiary['account_number'],
            'email'    => $beneficiary['email'],
            'ssn'   => $beneficiary['ssn'],
            'loan_type'    => $beneficiary['loan_type'],
            'loan_duration'=> $beneficiary['loan_duration'],
            'loan_reason'  => $beneficiary['loan_reason'],
            'status'       => 'processing',
            'created_at'   => $now,
            'updated_at'   => $now

        ]);



        return redirect()->route('user.loan.create')->with(['success'=>'Your request has be received and is currently been processed! Thank you for choosing to bank with us!']);
    

    }
}
