<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateCotacaoSeguroAPIRequest;
use App\Models\CotacaoSeguro;
use App\Repositories\CotacaoSeguroRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoSeguroController.
 */
class CotacaoSeguroAPIController extends AppBaseController
{
    /** @var CotacaoSeguroRepository */
    private $cotacaoSeguroRepository;

    public function __construct(CotacaoSeguroRepository $cotacaoSeguroRepo)
    {
        $this->cotacaoSeguroRepository = $cotacaoSeguroRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacoes/seguro",
     *      summary="Get a listing of the CotacaoSeguros.",
     *      tags={"CotacaoSeguro"},
     *      description="Get all CotacaoSeguros",
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
     *                  @SWG\Items(ref="#/definitions/CotacaoSeguro")
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
        $this->cotacaoSeguroRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoSeguroRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoSeguros = $this->cotacaoSeguroRepository->all();

        return $this->sendResponse($cotacaoSeguros->toArray(), 'Cotacao Seguros retrieved successfully');
    }

    /**
     * @param CreateCotacaoSeguroAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacoes/seguro",
     *      summary="Store a newly created CotacaoSeguro in storage",
     *      tags={"CotacaoSeguro"},
     *      description="Store CotacaoSeguro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoSeguro that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoSeguro")
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
     *                  ref="#/definitions/CotacaoSeguro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoSeguroAPIRequest $request)
    {
        $input = $request->all();

        $cotacaoSeguros = $this->cotacaoSeguroRepository->create($input);

        return $this->sendResponse($cotacaoSeguros->toArray(), 'Cotacao Seguro saved successfully');
    }
}
