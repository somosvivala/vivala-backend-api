<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ExperienciaRepository;

class EcoturismoAPIController extends AppBaseController
{
    /**
     * Instancia do repositorio de experiencias, contendo as operacoes com o BD.
     *
     * @var ExperienciaRepository
     */
    private $experienciaRepository;

    /**
     * videosServico.
     *
     * @var  \App\Models\VideosServicos
     */
    private $videosServico;

    /**
     * Construtor recebendo instancia do repositorio.
     *
     * @param ExperienciaRepository $experienciaRepo
     */
    public function __construct(ExperienciaRepository $experienciaRepo)
    {
        $this->experienciaRepository = $experienciaRepo;
        $this->videosServico = \App\Models\VideosServico::first();
    }

    /**
     * Metodo para retornar o JSON da listagem de experiencias de ecoturismo.
     *
     * @return JSON
     */
    public function getListagem()
    {
        //Instanciando o transformer que conhece o formato correto das experiencias na listagem
        $transformer = new \App\Transformers\ExperienciaListagemTransformer();

        $experiencias = [];
        $experienciasAtivas = $this->experienciaRepository->getAtivas();
        $experienciasAtivas->each(function ($Experiencia) use ($transformer, &$experiencias) {
            //Iterando sob cada uma das Expedicoes e retornando o valor transformado
            $experiencias[] = $transformer->transform($Experiencia);
        });

        //inserindo video de Ecoturismo na resposta da API
        $video = $this->videosServico->videoEcoturismo
           ? $this->videosServico->videoEcoturismo->partial_url
           : '';

        return [
            'video' => $video,
            'items' => $experiencias,
        ];
    }
}
