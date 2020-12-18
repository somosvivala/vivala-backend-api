<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Experiencia;
use App\Repositories\ExperienciaRepository;

class ExperienciasAPIController extends AppBaseController
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
     * Metodo para retornar o JSON de uma experiencia.
     *
     * @return JSON
     */
    public function getInterna($id)
    {
        $Experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($Experiencia)) {
            return $this->sendError('Experiencia not found');
        }

        $transformer = new \App\Transformers\ExperienciaTransformer();

        return $transformer->transform($Experiencia);
    }

    /**
     * Metodo para retornar o JSON da listagem de expedições, separando-as em edicoes futuras/passadas.
     *
     * @return JSON
     */
    public function getListagem()
    {
        //Instanciando o transformer que conhece o formato correto das expedicoes na listagem
        $transformer = new \App\Transformers\ExperienciaListagemTransformer();

        $futuras = [];
        $edicoesFuturas = $this->experienciaRepository->getEdicoesFuturas();
        $edicoesFuturas->each(function ($Experiencia) use ($transformer, &$futuras) {
            //Iterando sob cada uma das Experiencias e retornando o valor transformado
            $futuras[] = $transformer->transform($Experiencia);
        });

        $passadas = [];
        $edicoesPassadas = $this->experienciaRepository->getEdicoesPassadas();
        $edicoesPassadas->each(function ($Experiencia) use ($transformer, &$passadas) {
            //Iterando sob cada uma das Experiencias e retornando o valor transformado
            $passadas[] = $transformer->transform($Experiencia);
        });

        return [
            'edicoes_futuras' => $futuras,
            'edicoes_passadas' => $passadas,
        ];
    }
}
