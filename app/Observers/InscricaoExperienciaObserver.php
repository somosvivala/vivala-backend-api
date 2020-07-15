<?php

namespace App\Observers;

use App\Mail\NovaInscricaoExperiencia;
use App\Models\InscricaoExperiencia;
use Mail;

class InscricaoExperienciaObserver
{
    /**
     * Listen to the InscricaoExperiencia created event.
     *
     * @param  InscricaoExperiencia  $contato
     * @return void
     */
    public function created(InscricaoExperiencia $inscricao)
    {
        \Log::info('Nova InscricaoExperiencia Criada - Disparando email');
        Mail::send(new NovaInscricaoExperiencia($inscricao));
    }
}
