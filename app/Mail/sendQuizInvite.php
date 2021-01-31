<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendQuizInvite extends Mailable
{
    use Queueable, SerializesModels;

    public $link;
    public $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        //
        $this->link = $link;
        $this->sender = auth()->user()->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.sendQuizInvite')
        ->subject($this->sender.' has sent you a quiz invite!')
        ->from(auth()->user()->email);
    }
}
