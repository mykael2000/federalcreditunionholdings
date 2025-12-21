<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\OtpController;
use Carbon\Carbon;
use DB;

class WithdrawalController extends Controller
{
    public function create() {

        return view('user.withdrawal.create');

    }

    public function store() {

        request()->validate( [

            'amount'        => 'required|string',
            'account_name'  => 'required|string',
            'account_number'=> 'required|string',
            'bank_name'     => 'required|string',
            'swift_code'    => 'required|string'
        ]);

        $user = auth('user')->user();

        OtpController::sendOtpViaEmail($user, 'withdrawal request');

        session(['beneficiary'=>request()->all()]);

        return redirect()->route('user.withdrawal.verification');

    }

    public function verification () {

        if(empty(session('beneficiary'))) {
            return redirect()->route('user.withdrawal.create');
        }

        return view('user.withdrawal.verification');
    }


    public function verify(Request $request) {

        if(empty(session('beneficiary'))) {
            return redirect()->route('user.withdrawal.create');
        }

        $user = auth('user')->user();

        $now = Carbon::now();

        $beneficiary = session('beneficiary');
        session()->forget('beneficiary');


        OtpController::verifyTransOtp($request);


        DB::table('withdrawals')->insert([

            'user_id' => $user->id,
            'amount'    => $beneficiary['amount'],
            'account_name' => $beneficiary['account_name'],
            'account_number' => $beneficiary['account_number'],
            'bank_name'    => $beneficiary['bank_name'],
            'swift_code'   => $beneficiary['swift_code'],
            'status'       => 'processing',
            'created_at'   => $now,
            'updated_at'   => $now

        ]);



        return redirect()->route('user.withdrawal.create')->with(['success'=>'Your request has be received and is currently been processed! Thank you for choosing to bank with us!']);
    

    }
}
