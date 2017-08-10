<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCotacaoRodoviarioAPIRequest;
use App\Http\Requests\API\UpdateCotacaoRodoviarioAPIRequest;
use App\Models\CotacaoRodoviario;
use App\Repositories\CotacaoRodoviarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoRodoviarioController
 * @package App\Http\Controllers\API
 */

class CotacaoRodoviarioAPIController extends AppBaseController
{
    /** @var  CotacaoRodoviarioRepository */
    private $cotacaoRodoviarioRepository;

    public function __construct(CotacaoRodoviarioRepository $cotacaoRodoviarioRepo)
    {
        $this->cotacaoRodoviarioRepository = $cotacaoRodoviarioRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacoes/rodoviario",
     *      summary="Get a listing of the CotacaoRodoviarios.",
     *      tags={"CotacaoRodoviario"},
     *      description="Get all CotacaoRodoviarios",
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
     *                  @SWG\Items(ref="#/definitions/CotacaoRodoviario")
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
        $this->cotacaoRodoviarioRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoRodoviarioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoRodoviarios = $this->cotacaoRodoviarioRepository->all();

        return $this->sendResponse($cotacaoRodoviarios->toArray(), 'Cotacao Rodoviarios retrieved successfully');
    }

    /**
     * @param CreateCotacaoRodoviarioAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacoes/rodoviario",
     *      summary="Store a newly created CotacaoRodoviario in storage",
     *      tags={"CotacaoRodoviario"},
     *      description="Store CotacaoRodoviario",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoRodoviario that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoRodoviario")
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
     *                  ref="#/definitions/CotacaoRodoviario"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoRodoviarioAPIRequest $request)
    {
        $input = $request->all();

        $cotacaoRodoviarios = $this->cotacaoRodoviarioRepository->create($input);

        return $this->sendResponse($cotacaoRodoviarios->toArray(), 'Cotacao Rodoviario saved successfully');
    }

}
