<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ExpedicaoRepository;

class VolunturismoAPIController extends AppBaseController
{
    /**
     * Instancia do repositorio de expedicoes, contendo as operacoes com o BD.
     *
     * @var ExpedicaoRepository
     */
    private $expedicaoRepository;

    /**
     * videosServico.
     *
     * @var \App\Models\VideosServicos
     */
    private $videosServico;

    /**
     * Construtor recebendo instancia do repositorio.
     *
     * @param  ExpedicaoRepository  $expedicaoRepo
     */
    public function __construct(ExpedicaoRepository $expedicaoRepo)
    {
        $this->expedicaoRepository = $expedicaoRepo;
        $this->videosServico = \App\Models\VideosServico::first();
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

        //inserindo video de Volunturismo na resposta da API
        $video = $this->videosServico->videoVolunturismo
           ? $this->videosServico->videoVolunturismo->partial_url
           : '';

        return [
            'video' => $video,
            'items' => $expedicoes,
        ];
    }
}
