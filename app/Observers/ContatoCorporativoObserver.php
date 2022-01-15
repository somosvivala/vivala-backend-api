<?php

namespace App\Observers;

use App\Mail\NovoContatoCorporativo;
use App\Models\ContatoCorporativo;
use Mail;

class ContatoCorporativoObserver
{
    /**
     * Listen to the ContatoCorporativo created event.
     *
     * @param  ContatoCorporativo  $contato
     * @return void
     */
    public function created(ContatoCorporativo $contato)
    {
        Mail::send(new NovoContatoCorporativo($contato));
    }
}
