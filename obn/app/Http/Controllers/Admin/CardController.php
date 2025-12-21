<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CardController extends Controller
{
    public function index() {


        $cards = DB::table('cards')->join('users', 'users.id', '=', 'cards.user_id')
                                   ->select('cards.*', 'users.first_name', 'users.last_name', 'users.email', 'users.account_number')
                                   ->get();

        return view('admin.card.index', [
            'cards' => $cards
        ]);

    }
    

    public function show($id) {

        $card = DB::table('cards')->where('id', $id)->first();

        return view('admin.card.edit', [

            'card' => $card

        ]);

    }

    public function store() {

        request()->validate([
            'number' => 'required|numeric',
            'expiry_date' => 'required|string',
            'csv'         => 'required|numeric',
            'status'      => 'required'
        ]);

        $records = request()->all();

        unset($records['_token'], $records['card_id']);

        DB::table('cards')->where('id', request('card_id'))->update($records);

        return redirect()->back()->with(['success'=>'Successfully updated card information']);

    }

}
