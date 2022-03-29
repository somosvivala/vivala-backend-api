<?php

namespace App\Observers;

use App\Mail\PedidoCotacaoRodoviario;
use App\Models\CotacaoRodoviario;
use Mail;

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
