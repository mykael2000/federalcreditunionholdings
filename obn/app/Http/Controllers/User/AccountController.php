<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;
class AccountController extends Controller
{
    public function index() {
        return view('user.account.index', [
            'user' => auth('user')->user()
        ]);
    }

    public function store() {

        $user = auth('user')->user();

        request()->validate([

            'first_name' => 'required',
            'last_name'  => 'required',
            'username'   => 'required',
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'phone'      => 'required',
            'age'        => 'required',
            'address'    => 'required'

        ]);

        $record = request()->all();

        unset($record['_token']);

        DB::table('users')->where('id', $user->id)->update($record);

        return redirect()->back()->with(['success'=> 'Successfully saved changes!']);

    }

    public function changePassword() {

        request()->validate([

            'old_password' => 'required',
            'password'  => 'required|min:8|confirmed',
        ]);

        $user = auth('user')->user();

        $user = User::find($user->id);

        if(!password_verify(request('old_password'), $user->password)) {

            return redirect()->back()->with(['old_password'=>"Old password is incorrect"]);
        }

        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect()->back()->with(['success'=>"You have successfully changed your password!"]);

    }

    function profile() {

        return view('user.account.profile', [
            'user' => auth('user')->user()
        ]);

    }

    public function status() {
        return view('user.transfer.warning');
    }

    public function create() {

        return view('user.account.create', [
            'user' => auth('user')->user()
        ]);

    }

    public function storeAccount() {

        request()->validate([

            'first_name' => 'required',
            'last_name'  => 'required',
            'username'   => 'required',
            'email'      => 'required|email|unique:users',
            'phone'      => 'required',
            'address'    => 'required',
            'password'  => 'required|min:8|confirmed',
            'account_type' => 'required'

        ]);

        $user = auth('user')->user();

        $newUser = User::create([

            'first_name' => request('first_name'),
            'last_name'  => request('last_name'),
            'username'   => request('username'),
            'email'      => request('email'),
            'phone'      => request('phone'),
            'address'    => request('address'),
            'password'   => Hash::make(request('password')),
            'account_number' => $this->generateAccountNumber(),
            'age'        => $user->age,
            'currency'   => $user->currency,
            'account_type' => request('account_type')
        ]);


        DB::table('user_account')->insert([
            'user_id' => $user->id,
            'account_id' => $newUser->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with(['success'=>"You have successfully added a new account."]);

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


    public function accounts() {

        $accounts = DB::table('user_account')->join('users', 'users.id', '=', 'user_account.account_id')
                                      ->select('user_account.account_id', 'user_account.user_id', 'users.*')
                                      ->where('user_account.user_id', auth('user')->user()->id)
                                      ->orderBy('id', 'DESC')->get();

        return view('user.account.accounts', [

            'users' => $accounts
            
        ]);
    }

    public function loginAs($id) {

        Auth::guard('user')->loginUsingId($id, true);

        return redirect('/user');

    }
    
}
