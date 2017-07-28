<?php

namespace App\Observers;

use Mail;
use App\Models\ContatoCorporativo;
use App\Mail\NovoContatoCorporativo;

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
