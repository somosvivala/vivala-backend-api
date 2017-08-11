<?php

namespace App\Observers;

use Mail;
use App\Models\CotacaoAereo;
use App\Mail\PedidoCotacaoAereo;

class CotacaoAereoObserver
{
    /**
     * Listen to the CotacaoAereo created event.
     *
     * @param  CotacaoAereo  $contato
     * @return void
     */
    public function created(CotacaoAereo $contato)
    {
        Mail::send(new PedidoCotacaoAereo($contato));
    }
}
