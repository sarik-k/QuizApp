<?php

namespace App\Http\Livewire;

use App\Mail\sendQuizInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;


class SendEmail extends Component
{
    public $email;
    public $link;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function sendEmail(){

        $this->validate();
        
        Mail::to($this->email)
        ->send(new sendQuizInvite($this->link));

        session()->flash('message', 'Invite sent!');

    }

    public function render()
    {
        return view('livewire.send-email');
    }
}
