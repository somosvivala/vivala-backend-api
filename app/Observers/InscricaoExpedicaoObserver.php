<?php

namespace App\Observers;

use App\Mail\NovaInscricaoExpedicao;
use App\Models\InscricaoExpedicao;
use Mail;


class InscricaoExpedicaoObserver
{
    /**
     * Listen to the InscricaoExpedicao created event.
     *
     * @param  InscricaoExpedicao  $contato
     * @return void
     */
    public function created(InscricaoExpedicao $inscricao)
    {
        \Log::info('Nova InscricaoExpedicao Criada - Disparando email');
        Mail::send( new NovaInscricaoExpedicao($inscricao) );
    }
}
