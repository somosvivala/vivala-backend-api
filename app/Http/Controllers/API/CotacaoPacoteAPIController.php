<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCotacaoPacoteAPIRequest;
use App\Http\Requests\API\UpdateCotacaoPacoteAPIRequest;
use App\Models\CotacaoPacote;
use App\Repositories\CotacaoPacoteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoPacoteController
 * @package App\Http\Controllers\API
 */

class CotacaoPacoteAPIController extends AppBaseController
{
    /** @var  CotacaoPacoteRepository */
    private $cotacaoPacoteRepository;

    public function __construct(CotacaoPacoteRepository $cotacaoPacoteRepo)
    {
        $this->cotacaoPacoteRepository = $cotacaoPacoteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacoes/pacote",
     *      summary="Get a listing of the CotacaoPacotes.",
     *      tags={"CotacaoPacote"},
     *      description="Get all CotacaoPacotes",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/CotacaoPacote")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->cotacaoPacoteRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoPacoteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoPacotes = $this->cotacaoPacoteRepository->all();

        return $this->sendResponse($cotacaoPacotes->toArray(), 'Cotacao Pacotes retrieved successfully');
    }

    /**
     * @param CreateCotacaoPacoteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacoes/pacote",
     *      summary="Store a newly created CotacaoPacote in storage",
     *      tags={"CotacaoPacote"},
     *      description="Store CotacaoPacote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoPacote that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoPacote")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CotacaoPacote"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoPacoteAPIRequest $request)
    {

        $inputs = $request->all();
        $servicosHospedagem = [];
        if ( $request->cafe_manha ) {
            $servicosHospedagem[] = 'Café da Manhã';
        }
        if ( $request->piscina ) {
            $servicosHospedagem[] = 'Piscina';
        }
        if ( $request->wifi ) {
            $servicosHospedagem[] = 'Wifi';
        }
        if ( $request->academia ) {
            $servicosHospedagem[] = 'Academia';
        }
        if ( $request->estacionamento ) {
            $servicosHospedagem[] = 'Estacionamento';
        }
        if ( $request->cancelamento_gratis ) {
            $servicosHospedagem[] = 'Cancelamento gratis';
        }

        //Se tiver algum servicoHospedagem selecionado adicioanar o array na request
        if ( !empty($servicosHospedagem) ){
            $inputs = array_merge($inputs, ['hospedagem_servicos' => $servicosHospedagem]); 
        }

        //LIDAR COM Checkboxes de Transport interno
        if ( $request->transfer || $request->aluguel ) {
            $transporteInterno = $request->transfer ? 0 : 1;
            $inputs = array_merge($inputs, ['transporte_interno' => $transporteInterno]); 
        }
        
        $tiposTransfer = [];
        if ( $request->carro_compartilhado ) {
            $tiposTransfer[] = 'Carro compartilhado';
        }
        if ( $request->carro_compartilhado ) {
            $tiposTransfer[] = 'carro_compartilhado';
        }
        if ( $request->van_compartilhada ) {
            $tiposTransfer[] = 'van_compartilhada';
        }
        if ( $request->carro_privativo ) {
            $tiposTransfer[] = 'carro_privativo';
        }

        //Se tiver tipos transfer inserir na variavel
        if ( !empty($tiposTransfer) ){
            $inputs = array_merge($inputs, ['tipos_transfer' => $tiposTransfer]); 
        }
        
        $categoriasCarro = array();
        if ( $request->intermediario ) {
            $categoriasCarro[] = 'Intermediario';
        }
        if ( $request->compacto ) {
            $categoriasCarro[] = 'Compacto';
        }
        if ( $request->economico ) {
            $categoriasCarro[] = 'Economico';
        }
        if ( $request->suv ) {
            $categoriasCarro[] = 'SUV';
        }
        if ( $request->minivan ) {
            $categoriasCarro[] = 'Minivan';
        }
        if ( $request->premium ) {
            $categoriasCarro[] = 'Premium';
        }
        if ( $request->luxo ) {
            $categoriasCarro[] = 'Luxo';
        }
        if ( !empty($categoriasCarro) ){
           $inputs = array_merge($inputs, ['categorias_carro' => $categoriasCarro]); 
        }


        if ( $request->ar ) {
            $ItensCarro[] = 'Ar';
        }
        if ( $request->direcao_hidraulica ) {
            $ItensCarro[] = 'Direção hidráulica';
        }
        if ( $request->vidro_eletrico ) {
            $ItensCarro[] = 'Vidro elétrico';
        }
        if ( $request->automatico ) {
            $ItensCarro[] = 'Automático';
        }
        if ( $request->quatro_portas ) {
            $ItensCarro[] = 'Quatro portas';
        }
        if ( $request->cd_usb ) {
            $ItensCarro[] = 'CD ou USB';
        }
        if ( $request->radio ) {
            $ItensCarro[] = 'Radio';
        }
        if ( !empty($ItensCarro) ){
           $inputs = array_merge($inputs, ['itens_carro' => $ItensCarro]); 
        }

        $cotacaoPacotes = $this->cotacaoPacoteRepository->create($inputs);

        return $this->sendResponse($cotacaoPacotes->toArray(), 'Cotacao Pacote saved successfully');
    }

}
