<?php

namespace App\Observers;

use App\Models\Expedicao;
use App\Repositories\FotoRepository;

class ExpedicaoObserver
{
    /** @var FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo)
    {
        $this->fotoRepository = $fotoRepo;
    }

    /**
     * Listen to the Expedicao deleted event.
     * Para deletar as nested relationships.
     *
     * @param  Expedicao  $contato
     * @return void
     */
    public function deleted(Expedicao $exp)
    {
        //Se tiver Media Listagem, remover
        if ($exp->mediaListagem) {
            $this->fotoRepository->delete($exp->mediaListagem->id);
        }

        $fotoRepository = $this->fotoRepository;

        //Removendo as fotos dessa Expedicao
        if ($exp->fotos) {
            $exp->fotos->each(function ($foto) use ($fotoRepository) {
                $this->fotoRepository->delete($foto->id);
            });
        }

        //Removendo os videos dessa Expedicao
        if ($exp->videos) {
            $exp->videos->each(function ($video) {
                $video->delete();
            });
        }

        //Removendo os Blocos Descricao dessa Expedicao
        if ($exp->blocosDescricao) {
            $exp->blocosDescricao->each(function ($blocoDesc) {
                $blocoDesc->delete();
            });
        }

        //Removendo as isncricoes dessa Expedicao
        if ($exp->inscritos) {
            $exp->inscritos->each(function ($inscricao) {
                $inscricao->delete();
            });
        }
    }
}
