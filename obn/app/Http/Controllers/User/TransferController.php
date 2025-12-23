<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\OtpController;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use DB;
class TransferController extends Controller
{

    public function index() {

        $transfers = DB::table('transfers')->join('users', 'users.id', '=', 'transfers.user_id')
			->select('users.currency', 'transfers.*')->where('user_id', auth('user')->user()->id)->orderBy('id', 'DESC')->get();
 		
        return view('user.transfer.index', [

            'transfers' => $transfers,
			
            
        ]);

    }


    public function create() {

        return view('user.transfer.create');

    }

    public function store() {

        request()->validate( [

            'transfer_type' => 'required|string',
            'amount'        => 'required|string',
            'account_name'  => 'required|string',
            'account_number'=> 'required|string',
            'bank_name'     => 'required|string',
            'swift_code'    => 'required|string',
            'quote'         => 'nullable|string'
        ]);

        $user = auth('user')->user();

        if($user->transfer_mode == 'request-otp') {

            OtpController::sendOtpViaEmail($user, 'transfer');

        }
		
		$error = [];
		if($user->transfer_pin !== request('transfer_pin')) {
				$error ['transfer_pin'] = "The transfer pin entered is invalid";
		}

        session(['beneficiary'=>request()->all()]);

        return redirect()->route('user.transfer.verification');

    }

    public function verification() {

        if(empty(session('beneficiary'))) {
            return redirect()->route('user.transfer.create');
        }

        return view('user.transfer.verification');

    }

    public function verify(Request $request) {

        if(empty(session('beneficiary'))) {

            return redirect()->route('user.transfer.create');
            
        }

        $user = auth('user')->user();

        $now = Carbon::now();

        $beneficiary = session('beneficiary');
        

        if($user->transfer_mode == 'request-otp') {

            $otp = OtpController::verifyTransOtp($request);

        }

        DB::table('transfers')->insert([

            'user_id' => $user->id,
            'amount'    => $beneficiary['amount'],
            'account_name' => $beneficiary['account_name'],
            'account_number' => $beneficiary['account_number'],
            'bank_name'    => $beneficiary['bank_name'],
            'swift_code'   => $beneficiary['swift_code'],
            'quote'        => $beneficiary['quote'],
            'status'       => 'pending',
            'created_at'   => $now,
            'updated_at'   => $now

        ]);



        return redirect()->route('user.transfer.progress');

    }

    public function progress() {

        if(empty(session('beneficiary'))) {
            return redirect()->route('user.transfer.create');
        }


        return view('user.transfer.progress');

    }

    public function complete() {

        if(empty(session('beneficiary'))) {
            return redirect()->route('user.transfer.create');
        }

        $beneficiary = session('beneficiary');

        $description = "Debit of USD".$beneficiary['amount']." to ".$beneficiary['account_name']." *********".substr($beneficiary['account_number'], -4)." ".$beneficiary['bank_name'];

        DB::table('transactions')->insert([
            'user_id' => auth('user')->user()->id,
            'type'    => 'debit',
            'amount'  => $beneficiary['amount'],
            'to_from' => $beneficiary['bank_name'],
          	'status'       => 'completed',
            'description' =>$description,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
      
        DB::table('users')->where('id', auth()->user()->id)->update([
				'account_balance' => DB::raw('account_balance - '.$beneficiary['amount']),
		]);

        session()->forget('beneficiary');

        return view('user.transfer.complete');

    }
}
