<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendNotification;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'DESC')->get();

        return view('admin.user.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {

        return view('admin.user.create', [
            'id' => request('id'),
        ]);

    }

    public function store()
    {

        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'account_type' => 'required',
            'account_balance' => 'required',
			'otp' => 'nullable',

            'transfer_mode' => 'required',
            'account_number' => 'required',
            'password' => 'required|min:6|confirmed',
            'transfer_status' => 'required',
            'account_status' => 'required',

        ]);

        $records = request()->all();

        unset($records['user_id']);
        unset($records['_token']);
        unset($records['password_confirmation']);

        $records['password'] = Hash::make(request('password'));
        $records['updated_at'] = Carbon::now();
        $records['age'] = empty(request('age')) ? 'n/a' : request('age');

        DB::table('users')->insert($records);

        $lastId = DB::getPdo()->lastInsertId();

        $success = 'User created successfully!';

        if (!empty(request('user_id'))) {
            DB::table('user_account')->insert([
                'user_id' => request('user_id'),
                'account_id' => $lastId,
            ]);

            $success = "Joint account successfully created!";
        }

        return redirect()->back()->with(['success' => $success]);

    }

    public function show($id)
    {
        //$contents = Storage::get('/public/json/Common-Currency.json');
        //$currencies = json_decode($contents);
        return view('admin.user.edit', [
            'user' => DB::table('users')->where('id', $id)->first(),
            // 'currencies' => $currencies
        ]);

    }

    public function update(Request $request)
    {

        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . request('user_id'),
            'phone' => 'required',
            'address' => 'required',
            'account_type' => 'required',
            'account_balance' => 'required',
            'account_status' => 'required',
			'otp' => 'nullable',
            'created_at' => 'required',
            'transfer_mode' => 'required',
            'account_number' => 'required',
            'passport' => 'nullable|image',
            // 'currency' => 'required',
        ]);

        $records = request()->all();

        if ($request->hasFile('passport')) {

            $imagePath = $request->passport->store('public/checks');

            $records['profile'] = str_replace('public', '', $imagePath);

        }

        unset($records['user_id']);
        unset($records['_token']);
        unset($records['passport']);

        if (request('account_status') == 'Dormant') {
            $data = [
                'full_name' => request('first_name') . ' ' . request('last_name'),
                'email' => request('email'),
                'subject' => 'Account status notification',
            ];
            Mail::to(request('email'))->send(new SendNotification($data));
        }

        $records['age'] = empty(request('age')) ? 'n/a' : request('age');

        DB::table('users')->where('id', request('user_id'))->update($records);

        return redirect()->back()->with(['success' => 'Changes saved successfully!']);

    }

    public function changePassword()
    {

        request()->validate([

            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(request('user_id'));

        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect()->back()->with(['success' => "You have successfully changed your password!"]);
    }

    public function delete($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        DB::table('otp_verification')->where('user_id', $id)->delete();

        DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with(['success' => "You have successfully removed user!"]);
    }

    public function sendNotification()
    {

        request()->validate([
            'message' => 'required',
        ]);

        $user = DB::table('users')->where('id', request('user_id'))->first();

        $data = [
            'full_name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'subject' => 'Tax notification',
            'message' => request('message'),
        ];
        Mail::to($user->email)->send(new SendNotification($data));

        return redirect()->back()->with(['success' => 'Successfully sent tax notification!']);
    }

    public function loginAs($id)
    {

        Auth::guard('user')->loginUsingId($id, true);

        return redirect('/user');

    }
}