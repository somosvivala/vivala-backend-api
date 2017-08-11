<?php

namespace App\Observers;

use Mail;
use App\Models\CotacaoCruzeiro;
use App\Mail\PedidoCotacaoCruzeiro;

class CotacaoCruzeiroObserver
{
    /**
     * Listen to the CotacaoCruzeiro created event.
     *
     * @param  CotacaoCruzeiro  $contato
     * @return void
     */
    public function created(CotacaoCruzeiro $contato)
    {
        Mail::send(new PedidoCotacaoCruzeiro($contato));
    }
}
