<?php

namespace App\Observers;

use Mail;
use App\Models\CotacaoRodoviario;
use App\Mail\PedidoCotacaoRodoviario;

class CotacaoRodoviarioObserver
{
    /**
     * Listen to the CotacaoRodoviario created event.
     *
     * @param  CotacaoRodoviario  $contato
     * @return void
     */
    public function created(CotacaoRodoviario $contato)
    {
        Mail::send(new PedidoCotacaoRodoviario($contato));
    }
}
