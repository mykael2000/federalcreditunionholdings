<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;

class WebSettingController extends Controller
{
    public function index() {

        $contents = Storage::get('/public/json/Common-Currency.json');

        $currencies = json_decode($contents);

        $current_currency = DB::table('general_settings')->where('id', 1)->first();
		
		
        
        return view('admin.web-setting.index', [

            'currencies' => $currencies,
            'current_currency' => $current_currency

        ]);

    }

    public function store() {

        request()->validate([
            'currency' => 'required'
        ]);

        DB::table('general_settings')->updateOrInsert(['id'=>1], [
            'currency' => request('currency'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with(['success'=>'successfully saved changes']);

    }
}
