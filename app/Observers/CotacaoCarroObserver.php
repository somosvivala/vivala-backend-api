<?php

namespace App\Observers;

use App\Mail\PedidoCotacaoCarro;
use App\Models\CotacaoCarro;
use Mail;

class CotacaoCarroObserver
{
    /**
     * Listen to the CotacaoCarro created event.
     *
     * @param  CotacaoCarro  $contato
     * @return void
     */
    public function created(CotacaoCarro $contato)
    {
        Mail::send(new PedidoCotacaoCarro($contato));
    }
}
