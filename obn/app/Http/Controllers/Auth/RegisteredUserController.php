<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\OtpController;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
            'address' => 'required|string',
            'account_type' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([

            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'username'   => $request->user_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'age'        => $request->age,
            'account_type' => $request->account_type,
            'account_number' =>  $this->generateAccountNumber(),
            'password' => Hash::make($request->password),

        ]);

        event(new Registered($user));

        // Auth::login($user);


        OtpController::sendOtpViaEmail($user, 'registration');

        return redirect()->route('user.verify-otp.create');

    }

    public function generateAccountNumber() {
        $number = mt_rand(1111111111, 9999999999); // better than rand()

        $number = '32'.substr($number, 0, 12);
        // call the same function if the barcode exists already
        if ($this->accountNumberExists($number)) {
            return $this->generateAccountNumber();
        }
    
        // otherwise, it's valid and can be used
        return $number;
    }
    
    public function accountNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return User::whereAccountNumber($number)->exists();
    }
}
