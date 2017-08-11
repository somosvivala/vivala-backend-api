<?php

namespace App\Observers;

use Mail;
use App\Models\CotacaoCarro;
use App\Mail\PedidoCotacaoCarro;

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
