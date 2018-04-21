<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ExperienciaRepository;

class EcoturismoAPIController extends AppBaseController
{
    /**
     * Instancia do repositorio de expedicoes, contendo as operacoes com o BD.
     *
     * @var ExperienciaRepository
     */
    private $experienciaRepository;

    /**
     * Construtor recebendo instancia do repositorio.
     *
     * @param ExperienciaRepository $experienciaRepo
     */
    public function __construct(ExperienciaRepository $experienciaRepo)
    {
        $this->experienciaRepository = $experienciaRepo;
    }

    /**
     * Metodo para retornar o JSON da listagem de expedições de volunturismo.
     *
     * @return JSON
     */
    public function getListagem()
    {
        //Instanciando o transformer que conhece o formato correto das expedicoes na listagem
        $transformer = new \App\Transformers\ExperienciaListagemTransformer();

        $expedicoes = [];
        $expedicoesAtivas = $this->experienciaRepository->getAtivas();
        $expedicoesAtivas->each(function ($Experiencia) use ($transformer, &$expedicoes) {
            //Iterando sob cada uma das Expedicoes e retornando o valor transformado
            $expedicoes[] = $transformer->transform($Experiencia);
        });

        return [
            'items' => $expedicoes,
        ];
    }
}
