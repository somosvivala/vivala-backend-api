<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateCotacaoPasseioAPIRequest;
use App\Models\CotacaoPasseio;
use App\Repositories\CotacaoPasseioRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoPasseioController.
 */
class CotacaoPasseioAPIController extends AppBaseController
{
    /** @var CotacaoPasseioRepository */
    private $cotacaoPasseioRepository;

    public function __construct(CotacaoPasseioRepository $cotacaoPasseioRepo)
    {
        $this->cotacaoPasseioRepository = $cotacaoPasseioRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacoes/passeio",
     *      summary="Get a listing of the CotacaoPasseios.",
     *      tags={"CotacaoPasseio"},
     *      description="Get all CotacaoPasseios",
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
     *                  @SWG\Items(ref="#/definitions/CotacaoPasseio")
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
        $this->cotacaoPasseioRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoPasseioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoPasseios = $this->cotacaoPasseioRepository->all();

        return $this->sendResponse($cotacaoPasseios->toArray(), 'Cotacao Passeios retrieved successfully');
    }

    /**
     * @param CreateCotacaoPasseioAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacoes/passeio",
     *      summary="Store a newly created CotacaoPasseio in storage",
     *      tags={"CotacaoPasseio"},
     *      description="Store CotacaoPasseio",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoPasseio that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoPasseio")
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
     *                  ref="#/definitions/CotacaoPasseio"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoPasseioAPIRequest $request)
    {
        $input = $request->all();

        $cotacaoPasseios = $this->cotacaoPasseioRepository->create($input);

        return $this->sendResponse($cotacaoPasseios->toArray(), 'Cotacao Passeio saved successfully');
    }
}
