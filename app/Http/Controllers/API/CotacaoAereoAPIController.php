<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCotacaoAereoAPIRequest;
use App\Http\Requests\API\UpdateCotacaoAereoAPIRequest;
use App\Models\CotacaoAereo;
use App\Repositories\CotacaoAereoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoAereoController
 * @package App\Http\Controllers\API
 */

class CotacaoAereoAPIController extends AppBaseController
{
    /** @var  CotacaoAereoRepository */
    private $cotacaoAereoRepository;

    public function __construct(CotacaoAereoRepository $cotacaoAereoRepo)
    {
        $this->cotacaoAereoRepository = $cotacaoAereoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacoes/aereo",
     *      summary="Get a listing of the CotacaoAereos.",
     *      tags={"CotacaoAereo"},
     *      description="Get all CotacaoAereos",
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
     *                  @SWG\Items(ref="#/definitions/CotacaoAereo")
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
        $this->cotacaoAereoRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoAereoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoAereos = $this->cotacaoAereoRepository->all();

        return $this->sendResponse($cotacaoAereos->toArray(), 'Cotacao Aereos retrieved successfully');
    }

    /**
     * @param CreateCotacaoAereoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacoes/aereo",
     *      summary="Store a newly created CotacaoAereo in storage",
     *      tags={"CotacaoAereo"},
     *      description="Store CotacaoAereo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoAereo that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoAereo")
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
     *                  ref="#/definitions/CotacaoAereo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoAereoAPIRequest $request)
    {
        $input = $request->all();

        $cotacaoAereos = $this->cotacaoAereoRepository->create($input);

        return $this->sendResponse($cotacaoAereos->toArray(), 'Cotacao Aereo saved successfully');
    }

}
