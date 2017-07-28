<?php

namespace App\Observers;

use Mail;
use App\Models\ContatoAgente;
use App\Mail\NovoContatoAgente;

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
        Mail::send(new NovoContatoAgente($contato));
    }
}
