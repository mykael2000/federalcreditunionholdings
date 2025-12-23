<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class CardController extends Controller
{
    public function index() {
        
        $cards = DB::table('cards')->where('user_id', auth('user')->user()->id)->get();

        return view('user.card.index', [
            'cards'=> $cards
        ]);

    }

    public function store() {

        request()->validate([
            'card_type' => 'required'
        ]);

        DB::table('cards')->insert([
            'user_id' => auth('user')->user()->id,
            'type' => request('card_type'),
            'status'    => 'pending approval',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);

        return redirect()->back()->with(['success'=>'Card application has been successfully sent and is pending approval!']);

    }
}
