<?php

namespace App\Observers;

use App\Mail\PedidoCotacaoSeguro;
use App\Models\CotacaoSeguro;
use Mail;

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
