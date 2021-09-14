<?php

namespace App\Listeners;

use App\Events\MessageWasReceibed;
use App\Mail\MessageReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAutoResponder implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  MessageWasReceibed  $event
     * @return void
     */
    public function handle(MessageWasReceibed $event)
    {
        $msg = $event->message;
        Mail::to('jonatangarzon95@gmail.com')->queue(new MessageReceived($msg));
    }
}
