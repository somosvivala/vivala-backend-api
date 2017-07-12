<?php

namespace App\Observers;

use App\Mail\NovoContatoAgente;
use App\Models\ContatoAgente;
use Mail;


class ContatoAgenteObserver
{
    /**
     * Listen to the ContatoAgente created event.
     *
     * @param  ContatoAgente  $contato
     * @return void
     */
    public function created(ContatoAgente $contato)
    {
        Mail::send( new NovoContatoAgente($contato) );
    }
}
