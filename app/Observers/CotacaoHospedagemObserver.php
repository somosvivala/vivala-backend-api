<?php

namespace App\Observers;

use Mail;
use App\Models\CotacaoHospedagem;
use App\Mail\PedidoCotacaoHospedagem;

class CotacaoHospedagemObserver
{
    /**
     * Listen to the CotacaoHospedagem created event.
     *
     * @param  CotacaoHospedagem  $contato
     * @return void
     */
    public function created(CotacaoHospedagem $contato)
    {
        Mail::send(new PedidoCotacaoHospedagem($contato));
    }
}
