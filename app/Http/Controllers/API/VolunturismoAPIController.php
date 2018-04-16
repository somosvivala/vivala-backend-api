<?php

namespace App\Http\Controllers\API;

use App\Repositories\ExpedicaoRepository;
use App\Http\Controllers\AppBaseController;

class VolunturismoAPIController extends AppBaseController
{
    /**
     * Instancia do repositorio de expedicoes, contendo as operacoes com o BD.
     *
     * @var ExpedicaoRepository
     */
    private $expedicaoRepository;

    /**
     * Construtor recebendo instancia do repositorio.
     *
     * @param ExpedicaoRepository $expedicaoRepo
     */
    public function __construct(ExpedicaoRepository $expedicaoRepo)
    {
        $this->expedicaoRepository = $expedicaoRepo;
    }

    /**
     * Metodo para retornar o JSON da listagem de expedições de volunturismo.
     *
     * @return JSON
     */
    public function getListagem()
    {
        //Instanciando o transformer que conhece o formato correto das expedicoes na listagem
        $transformer = new \App\Transformers\ExpedicaoListagemTransformer();

        $expedicoes = [];
        $expedicoesAtivas = $this->expedicaoRepository->getAtivas();
        $expedicoesAtivas->each(function ($Expedicao) use ($transformer, &$expedicoes) {
            //Iterando sob cada uma das Expedicoes e retornando o valor transformado
            $expedicoes[] = $transformer->transform($Expedicao);
        });

        return [
            'items' => $expedicoes,
        ];
    }
}
