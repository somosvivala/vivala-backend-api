<?php

namespace App\Observers;

use App\Mail\PedidoCotacaoPasseio;
use App\Models\CotacaoPasseio;
use Mail;

class CotacaoPasseioObserver
{
    /**
     * Listen to the CotacaoPasseio created event.
     *
     * @param  CotacaoPasseio  $contato
     * @return void
     */
    public function created(CotacaoPasseio $contato)
    {
        Mail::send(new PedidoCotacaoPasseio($contato));
    }
}
