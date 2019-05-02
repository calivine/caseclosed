<?php

namespace App\Mail;

use App\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     *
     * @var Message
     */
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->subject("Message received: " . $this->message->subject)
                    ->view('emails.messages.received')
                    ->with([
                        'subject' => $this->message->subject,
                        'body' => $this->message->body,
                        'email' => $this->message->email
                    ]);
    }
}
