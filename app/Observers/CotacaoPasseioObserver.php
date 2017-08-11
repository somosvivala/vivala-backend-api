<?php

namespace App\Observers;

use Mail;
use App\Models\CotacaoPasseio;
use App\Mail\PedidoCotacaoPasseio;

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
