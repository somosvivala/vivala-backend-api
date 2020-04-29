<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateCotacaoCarroAPIRequest;
use App\Models\CotacaoCarro;
use App\Repositories\CotacaoCarroRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoCarroController.
 */
class CotacaoCarroAPIController extends AppBaseController
{
    /** @var CotacaoCarroRepository */
    private $cotacaoCarroRepository;

    public function __construct(CotacaoCarroRepository $cotacaoCarroRepo)
    {
        $this->cotacaoCarroRepository = $cotacaoCarroRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacoes/carro",
     *      summary="Get a listing of the CotacaoCarros.",
     *      tags={"CotacaoCarro"},
     *      description="Get all CotacaoCarros",
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
     *                  @SWG\Items(ref="#/definitions/CotacaoCarro")
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
        $this->cotacaoCarroRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoCarroRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoCarros = $this->cotacaoCarroRepository->all();

        return $this->sendResponse($cotacaoCarros->toArray(), 'Cotacao Carros retrieved successfully');
    }

    /**
     * @param CreateCotacaoCarroAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacoes/carro",
     *      summary="Store a newly created CotacaoCarro in storage",
     *      tags={"CotacaoCarro"},
     *      description="Store CotacaoCarro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoCarro that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoCarro")
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
     *                  ref="#/definitions/CotacaoCarro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoCarroAPIRequest $request)
    {
        $input = $request->all();

        \Log::info(json_encode($input));

        $cotacaoCarros = $this->cotacaoCarroRepository->create($input);

        return $this->sendResponse($cotacaoCarros->toArray(), 'Cotacao Carro saved successfully');
    }
}
