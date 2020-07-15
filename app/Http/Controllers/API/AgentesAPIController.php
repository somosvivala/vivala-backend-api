<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Repositories\AgenteRepository;
use App\Transformers\AgenteTransformer;

class AgentesAPIController extends AppBaseController
{
    /**
     * Instancia do repositorio de agentes, contendo as operacoes com o BD.
     *
     * @var AgenteRepository
     */
    private $agenteRepository;

    /**
     * Construtor recebendo instancia do repositorio.
     *
     * @param AgenteRepository $agenteRepo
     */
    public function __construct(AgenteRepository $agenteRepo)
    {
        $this->agenteRepository = $agenteRepo;
    }

    /**
     * Metodo para retornar o JSON da listagem de agentes, separando-as em edicoes agentes/passadas.
     *
     * @return JSON
     */
    public function getListagem()
    {
        $agentes = $this->agenteRepository->getAgentesEmDestaque();
        $agentesTransformados = [];
        $transformer = new AgenteTransformer();

        if ($agentes) {
            $agentes->each(function ($Agente) use ($transformer, &$agentesTransformados) {
                $agentesTransformados[] = $transformer->transform($Agente);
            });
        }

        return [
            'agentes' => $agentesTransformados,
        ];
    }
}
