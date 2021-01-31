@component('mail::message')

# <div align="center">{{ $sender }} has sent you a Quiz Invite!</div>



<div align="center">Click the button below to challenge yourself!</div>

@component('mail::button',['url' => $link] )
    Take Quiz    
@endcomponent

@endcomponent