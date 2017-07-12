<?php

namespace App\Observers;

use App\Mail\NovoContatoGeral;
use App\Models\ContatoGeral;
use Mail;


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
        Mail::send( new NovoContatoGeral($contato) );
    }
}
