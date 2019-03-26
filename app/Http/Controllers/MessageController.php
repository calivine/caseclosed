<?php

namespace App\Http\Controllers;

use App\Message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /*
     * GET
     * /messages/create
     * Display form to submit a message.
     */
    public function create() {
        return view('messages.submit-comment');
    }

    /*
     * POST
     * /messages
     * Process message input from comment form.
     */
    public function store(Request $request) {
        // Code to process comment form
        $request->validate([
            'subject' => 'required'
        ]);
        $message = new Message;
        $message->subject = $request->input('subject');
        $message->email = $request->input('email');
        $message->body = $request->input('body');
        $message->status = 'unread';
        $message->save();

        return redirect('home')->with([
            'alert' => 'Comment Submitted.'
        ]);
    }
}
