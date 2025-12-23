<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Mail\SendOtp;

use Carbon\Carbon;

use App\Models\User;

use App\Models\Otp;

use Auth;

class OtpController extends Controller
{
    public function verifyOtpCreate() {

        return view('auth.verify-otp');
        
    }

    public static function sendOtpViaEmail($user, $process) {

        $number = mt_rand(1111111111, 9999999999); // better than rand()

         $otp = substr($number, 0, 7);
			//$otp = $user->otp;
        $data = [
            "full_name" => $user->first_name.' '.$user->last_name,
            "email"     => $user->email,
            "otp"       => $otp,
            'process'   => $process
        ];

        DB::table('otp_verification')->updateOrInsert(['user_id'=>$user->id], [

            'user_id' => $user->id,
            'otp'     => $otp,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
		
      //$to = $user->email;
      //$subject = "OTP for $process";
      //$message = "Dear {$user->first_name},\n\nYour OTP for $process is: $otp\n\nThank you.";
      //$headers = "From: support@federalcreditunionholdings.online"; 

      // Send the email
      //if (mail($to, $subject, $message, $headers)) {
         // return $otp; // Return the OTP if the email was sent successfully
      //} else {
          // Handle the error (e.g., log it, throw an exception, etc.)
          // For now, just return false
        //  return false;
      //}
	
        Mail::to($user->email)->send(new SendOtp($data));

    }

    public function verifyLoginOtp(Request $request) {

        $request->validate([

            'otp' => 'required'

        ]);

        $otp = Otp::where('otp', $request->otp)->first();

        if(empty($otp)) {

            throw ValidationException::withMessages([
                'otp' => "The Otp entered is invalid",
            ]);

        }

        $user = User::where('id', $otp->user_id)->first();

        Otp::where('id', $otp->id)->delete();

        Auth::guard('user')->login($user);

        return redirect()->route('user.home');
    }

    public static function verifyTransOtp($request) {

        $request->validate([

            'otp' => 'required'

        ]);

        $otp = Otp::where('otp', $request->otp)->first();

        if(empty($otp)) {

            throw ValidationException::withMessages([
                'otp' => "The Otp entered is invalid",
            ]);

        }

        Otp::where('id', $otp->id)->delete();

        return true;

    }
}
