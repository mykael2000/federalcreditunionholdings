<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DepositController extends Controller
{
    public function create() {

        return view('user.deposit.create');

    }

    public function viaCheckStore() {

        request()->validate([
            'check_upload' => 'required|image',
            'amount'       => 'required|string'
        ]);

        $uploadPath = request()->check_upload->store("public/checks");

        DB::table('deposits')->insert([
            'user_id' => auth('user')->user()->id,
            'check_upload' => $uploadPath,
            'amount'       => request('amount'),
            'deposit_mode' => 'via check upload',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        return redirect()->back()->with(['success'=>'Your Deposit is currently been review/processed and your account will be credited after a successful review! Thank you for choosing to bank with us!']);

    }

    public function viaBTC() {

        request()->validate([
            'btc_amount'       => 'required|string'
        ]);

        DB::table('deposits')->insert([
            'user_id' => auth('user')->user()->id,
            'amount'       => request('btc_amount'),
            'deposit_mode' => 'via BTC',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        return redirect()->back()->with(['success'=>'Your Deposit is currently been review/processed and your account will be credited after a successful review! Thank you for choosing to bank with us!']);

    }
}
