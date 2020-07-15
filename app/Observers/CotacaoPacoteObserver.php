<?php

namespace App\Observers;

use App\Mail\PedidoCotacaoPacote;
use App\Models\CotacaoPacote;
use Mail;

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
