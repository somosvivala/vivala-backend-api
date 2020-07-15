<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateCotacaoPacoteAPIRequest;
use App\Models\CotacaoPacote;
use App\Repositories\CotacaoPacoteRepository;
use App\Traits\ArrumaRequestCotacoesTrait;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoPacoteController.
 */
class CotacaoPacoteAPIController extends AppBaseController
{
    use ArrumaRequestCotacoesTrait;

    /** @var CotacaoPacoteRepository */
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

        //Usando metodos do ArrumaRequestCotacoesTrait para tratar a request inserindo os campos de acordo com o esperado
        $this->arrumaCamposHospedagem($request, $inputs);
        $this->arrumaCampoTransporteInterno($request, $inputs);
        $this->arrumaCampoTiposTransfer($request, $inputs);
        $this->arrumaCampoCategoriasCarro($request, $inputs);
        $this->arrumaCampoItensCarro($request, $inputs);
        $this->arrumaCampoSegurosViagem($request, $inputs);
        //$this->arrumaCampoPasseiosInteresses($request, $inputs);

        $cotacaoPacotes = $this->cotacaoPacoteRepository->create($inputs);

        return $this->sendResponse($cotacaoPacotes->toArray(), 'Cotacao Pacote saved successfully');
    }
}
