<?php

namespace App\Observers;

use App\Models\Agente;
use App\Repositories\FotoRepository;

class AgenteObserver
{

    /** @var  FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo)
    {
        $this->fotoRepository = $fotoRepo;
    }


    /**
     * Listen to the Agente deleted event.
     * Para deletas as nested relationships
     *
     * @param  Agente  $contato
     * @return void
     */
    public function deleted(Agente $agente)
    {
        if ( $agente->foto ) {
            $this->fotoRepository->delete($agente->foto->id);
        }
    }
}
