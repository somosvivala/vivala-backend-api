<?php

namespace App\Http\Controllers\API;

use App\Repositories\ImersaoRepository;
use App\Http\Controllers\AppBaseController;

class ImersoesAPIController extends AppBaseController
{
    /**
     * Instancia do repositorio de imersoes, contendo as operacoes com o BD.
     *
     * @var ImersaoRepository
     */
    private $imersaoRepository;

    /**
     * videosServico.
     *
     * @var  \App\Models\VideosServicos
     */
    private $videosServico;

    /**
     * Construtor recebendo instancia do repositorio.
     *
     * @param ImersaoRepository $imersaoRepo
     */
    public function __construct(ImersaoRepository $imersaoRepo)
    {
        $this->imersaoRepository = $imersaoRepo;
        $this->videosServico = \App\Models\VideosServico::first();
    }

    /**
     * Metodo para retornar o JSON da listagem de expedições de volunturismo.
     *
     * @return JSON
     */
    public function getListagem()
    {
        //Instanciando o transformer que conhece o formato correto das imersoes na listagem
        $transformer = new \App\Transformers\ImersaoListagemTransformer();

        $imersoes = [];
        $imersoesAtivas = $this->imersaoRepository->getAtivas();
        $imersoesAtivas->each(function ($Imersao) use ($transformer, &$imersoes) {
            //Iterando sob cada uma das Imersoes e retornando o valor transformado
            $imersoes[] = $transformer->transform($Imersao);
        });

        //inserindo video de Imersoes na resposta da API
        $video = $this->videosServico->videoImersoes
           ? $this->videosServico->videoImersoes->partial_url
           : '';

        return [
            'video' => $video,
            'items' => $imersoes,
        ];
    }
}
