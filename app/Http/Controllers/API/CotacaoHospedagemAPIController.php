<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use App\Models\CotacaoHospedagem;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CotacaoHospedagemRepository;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use App\Http\Requests\API\CreateCotacaoHospedagemAPIRequest;

/**
 * Class CotacaoHospedagemController.
 */
class CotacaoHospedagemAPIController extends AppBaseController
{
    /** @var CotacaoHospedagemRepository */
    private $cotacaoHospedagemRepository;

    public function __construct(CotacaoHospedagemRepository $cotacaoHospedagemRepo)
    {
        $this->cotacaoHospedagemRepository = $cotacaoHospedagemRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacoes/hospedagem",
     *      summary="Get a listing of the CotacaoHospedagems.",
     *      tags={"CotacaoHospedagem"},
     *      description="Get all CotacaoHospedagems",
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
     *                  @SWG\Items(ref="#/definitions/CotacaoHospedagem")
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
        $this->cotacaoHospedagemRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoHospedagemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoHospedagems = $this->cotacaoHospedagemRepository->all();

        return $this->sendResponse($cotacaoHospedagems->toArray(), 'Cotacao Hospedagems retrieved successfully');
    }

    /**
     * @param CreateCotacaoHospedagemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacoes/hospedagem",
     *      summary="Store a newly created CotacaoHospedagem in storage",
     *      tags={"CotacaoHospedagem"},
     *      description="Store CotacaoHospedagem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoHospedagem that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoHospedagem")
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
     *                  ref="#/definitions/CotacaoHospedagem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoHospedagemAPIRequest $request)
    {
        $input = $request->all();

        $cotacaoHospedagems = $this->cotacaoHospedagemRepository->create($input);

        return $this->sendResponse($cotacaoHospedagems->toArray(), 'Cotacao Hospedagem saved successfully');
    }
}
