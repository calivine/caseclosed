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
    public function create()
    {
        return view('messages.submit-comment');
    }

    /*
     * POST
     * /messages
     * Process message input from comment form.
     */
    public function store(Request $request)
    {
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

    /*
     * GET
     * /messages/inbox
     * Display inbox of messages
     */
    public function inbox()
    {
        $messages = Message::all();
        return view('inbox')->with([
            'messages' => $messages
        ]);
    }

    /*
     * GET
     * /messages/{id}
     * Display full message
     */
    public function displayMessage($id)
    {
        $message = Message::find($id);
        if ($message->status === 'unread') {
            $message->status = 'read';
        }
        return view('message')->with([
            'message' => $message
        ]);
    }
}
