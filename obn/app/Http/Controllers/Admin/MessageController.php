<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index() {

        $messages = DB::table('messages')->join('users', 'users.id', '=', 'messages.sender_id')
                                         ->select('users.first_name', 'users.last_name', 'messages.*')
                                         ->get();
        return view('admin.message.index', [

            'messages' => $messages

        ]);
    }

    public function show($id) {

        $messages = DB::table('replies')->join('messages', 'messages.id', '=', 'replies.message_id')
                                        ->join('users', 'users.id', '=', 'messages.sender_id')
                                        ->select('messages.*', 'replies.content', 'replies.sender_id as replied_by', 'replies.recipient_id', 'replies.message_id', 'replies.created_at as replied_at', 'users.first_name', 'users.last_name', 'users.email')
                                        ->where('replies.message_id', $id)->orderBy('replies.id', 'ASC')->get();

        return view('admin.message.show', [

            'messages' => $messages

        ]);

    }

    public function reply($id) {

        request()->validate([
            'message' => 'required|string'
        ]);

        $message = DB::table('messages')->where('id', $id)->first();

        DB::table('replies')->insert([

            'sender_id' => auth('admin')->user()->id,
            'recipient_id' => $message->sender_id,
            'message_id'   => $message->id,
            'content'      => request('message'),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()

        ]);

        return redirect()->back()->with(['success'=>'Successfully replied message']);

    }
	
	public function contactPageMessages() {
		
		$messages = DB::table('contacts')->get();
		
		return view('admin.message.contact-page', [
			'messages' => $messages
		]);
	
	}
		
}
