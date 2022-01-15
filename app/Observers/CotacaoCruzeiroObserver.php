<?php

namespace App\Observers;

use App\Mail\PedidoCotacaoCruzeiro;
use App\Models\CotacaoCruzeiro;
use Mail;

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
