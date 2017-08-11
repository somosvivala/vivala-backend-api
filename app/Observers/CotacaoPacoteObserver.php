<?php

namespace App\Observers;

use Mail;
use App\Models\CotacaoPacote;
use App\Mail\PedidoCotacaoPacote;

class CotacaoPacoteObserver
{
    /**
     * Listen to the CotacaoPacote created event.
     *
     * @param  CotacaoPacote  $contato
     * @return void
     */
    public function created(CotacaoPacote $contato)
    {
        Mail::send(new PedidoCotacaoPacote($contato));
    }
}
