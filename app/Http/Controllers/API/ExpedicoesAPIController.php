<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\Expedicao;
use App\Repositories\ExpedicaoRepository;
use Illuminate\Http\Request;

class ExpedicoesAPIController extends AppBaseController
{
    /**
     * Instancia do repositorio de expedicoes, contendo as operacoes com o BD 
     *
     * @var ExpedicaoRepository 
     */
    private $expedicaoRepository;

    /**
     * Construtor recebendo instancia do repositorio
     *
     * @param ExpedicaoRepository $expedicaoRepo
     */
    public function __construct(ExpedicaoRepository $expedicaoRepo)
    {
        $this->expedicaoRepository = $expedicaoRepo;
    }

    /**
     * Metodo para retornar o JSON de uma expedicao
     *
     * @return JSON
     */
    public function getInterna($id) 
    {
        $Expedicao = $this->expedicaoRepository->findWithoutFail($id);

        if (empty($Expedicao)) {
            return $this->sendError('Expedicao not found');
        }

        $transformer = new \App\Transformers\ExpedicaoTransformer();
        return $transformer->transform($Expedicao);
    }

    
    /**
     * Metodo para retornar o JSON da listagem de expedições, separando-as em edicoes futuras/passadas
     *
     * @return JSON
     */
    public function getListagem() 
    {
        //Instanciando o transformer que conhece o formato correto das expedicoes na listagem
        $transformer = new \App\Transformers\ExpedicaoListagemTransformer();

        $futuras = [];
        $edicoesFuturas = $this->expedicaoRepository->getEdicoesFuturas();
        $edicoesFuturas->each(function ($Expedicao) use ($transformer, &$futuras) {
            //Iterando sob cada uma das Expedicoes e retornando o valor transformado
            $futuras[] = $transformer->transform($Expedicao);
        });

        $passadas = [];
        $edicoesPassadas = $this->expedicaoRepository->getEdicoesPassadas();
        $edicoesPassadas->each(function ($Expedicao) use ($transformer, &$passadas) {
            //Iterando sob cada uma das Expedicoes e retornando o valor transformado
            $passadas[] = $transformer->transform($Expedicao);
        });

        return [
            'edicoes_futuras' => $futuras,
            'edicoes_passadas' => $passadas,
        ];
        
    }

}
