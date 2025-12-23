<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function index() {

        $messages = DB::table('replies')->join('messages', 'messages.id', '=', 'replies.message_id')
                                        ->select('messages.*', 'replies.content', 'replies.sender_id', 'replies.recipient_id', 'replies.message_id')
                                        ->where('replies.recipient_id', auth('user')->user()->id)->groupBy('replies.message_id')->orderBy('replies.id', 'DESC')->get();
        return view('user.message.index', [
            'messages' => $messages
        ]);

    }

    public function count($id) {

        return DB::table('replies')->where([['message_id', $id], ['recipient_id', auth('user')->user()->id]])->count();

    }

    public function view($id) {

        $messages = DB::table('replies')->join('messages', 'messages.id', '=', 'replies.message_id')
                                        ->select('messages.*', 'replies.content', 'replies.sender_id as replied_by', 'replies.recipient_id', 'replies.message_id', 'replies.created_at as replied_at')
                                        ->where('replies.message_id', $id)->orderBy('replies.id', 'ASC')->get();

        return view('user.message.view', [

            'messages' => $messages

        ]);

    }

    public function create() {

        return view('user.message.create');

    }

    public function store() {


        request()->validate([

            'subject' => 'required',
            'to'      => 'required',
            'priority' => 'required',
            'message'  => 'required'

        ]);


        DB::table('messages')->insert([
            'sender_id' => auth('user')->user()->id,
            'recipient' => request('to'),
            'priority'  => 'administrator',
            'subject'   => request('subject'),
            'message'   => request('message'),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);


        return redirect()->back()->with(['success'=>'Successfully sent message to the '.request('priority')]);

    }

    public function sent() {
        $messages  = DB::table('messages')->where('id', auth('user')->user()->id)->get();

        return view('user.message.sent', [

            'messages' => $messages

        ]);
    }

    public function reply($id) {

        request()->validate([
            'message' => 'required|string'
        ]);

        $message = DB::table('messages')->where('id', $id)->first();

        DB::table('replies')->insert([

            'sender_id' => auth('user')->user()->id,
            'recipient_id' => $message->sender_id,
            'message_id'   => $message->id,
            'content'      => request('message'),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()

        ]);

        return redirect()->back()->with(['success'=>'Successfully replied message']);

    }
}
                                                       