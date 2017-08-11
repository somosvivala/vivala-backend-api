<?php

namespace App\Observers;

use Mail;
use App\Models\CotacaoSeguro;
use App\Mail\PedidoCotacaoSeguro;

class CotacaoSeguroObserver
{
    /**
     * Listen to the CotacaoSeguro created event.
     *
     * @param  CotacaoSeguro  $contato
     * @return void
     */
    public function created(CotacaoSeguro $contato)
    {
        Mail::send(new PedidoCotacaoSeguro($contato));
    }
}
