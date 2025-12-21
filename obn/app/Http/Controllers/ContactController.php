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

class ContactController extends Controller
{
    public function store() {
		
		request()->validate([
			'name' => 'required',
			'email'=> 'required|email',
			'subject' => 'required',
			'message' => 'required'
		]);
		
		DB::table('contacts')->insert([
			'name' => request('name'),
			'email'=> request('email'),
			'subject' => request('subject'),
			'message'  => request('message'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
		]);
		
        return response()->json(['success'=>true]);
        
    }
    
}
