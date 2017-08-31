<?php

namespace App\Observers;

use App\Models\Experiencia;
use App\Repositories\FotoRepository;

class ExperienciaObserver
{

    /** @var  FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo)
    {
        $this->fotoRepository = $fotoRepo;
    }


    /**
     * Listen to the Experiencia deleted event.
     * Para deletar as nested relationships
     *
     * @param  Experiencia  $contato
     * @return void
     */
    public function deleted(Experiencia $exp)
    {
        //Se tiver Media Listagem, remover
        if ( $exp->mediaListagem ) {
                $this->fotoRepository->delete($exp->mediaListagem->id);
        }

        $fotoRepository = $this->fotoRepository;

        //Removendo as fotos dessa Experiencia
        if ( $exp->fotos ) {
            $exp->fotos->each(function ($foto) use ($fotoRepository) {
                $this->fotoRepository->delete($foto->id);
            });
        }

        //Removendo os videos dessa Experiencia
        if ( $exp->videos ) {
            $exp->videos->each(function ($video) {
                $video->delete();
            });
        }

        //Removendo os Blocos Descricao dessa Experiencia
        if ( $exp->blocosDescricao ) {
            $exp->blocosDescricao->each(function ($blocoDesc) {
                $blocoDesc->delete();
            });
        }

        //Removendo as isncricoes dessa Experiencia
        if ( $exp->inscritos ) {
            $exp->inscritos->each(function ($inscricao) {
                $inscricao->delete();
            });
        }
    }
}
