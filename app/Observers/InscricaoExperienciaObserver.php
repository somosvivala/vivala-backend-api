<?php

namespace App\Observers;

use Mail;
use App\Models\InscricaoExperiencia;
use App\Mail\NovaInscricaoExperiencia;

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
