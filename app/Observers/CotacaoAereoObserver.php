<?php

namespace App\Observers;

use App\Mail\PedidoCotacaoAereo;
use App\Models\CotacaoAereo;
use Mail;

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
