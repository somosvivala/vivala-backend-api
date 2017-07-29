<?php

namespace App\Observers;

use App\Mail\PedidoCotacaoHospedagem;
use App\Models\CotacaoHospedagem;
use Mail;

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
