<?php

namespace App\Observers;

use Mail;
use App\Models\ContatoGeral;
use App\Mail\NovoContatoGeral;

class ContatoGeralObserver
{
    /**
     * Listen to the ContatoGeral created event.
     *
     * @param  ContatoGeral  $contato
     * @return void
     */
    public function created(ContatoGeral $contato)
    {
        Mail::send(new NovoContatoGeral($contato));
    }
}
