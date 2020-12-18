<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateCotacaoCruzeiroAPIRequest;
use App\Models\CotacaoCruzeiro;
use App\Repositories\CotacaoCruzeiroRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoCruzeiroController.
 */
class CotacaoCruzeiroAPIController extends AppBaseController
{
    /** @var CotacaoCruzeiroRepository */
    private $cotacaoCruzeiroRepository;

    public function __construct(CotacaoCruzeiroRepository $cotacaoCruzeiroRepo)
    {
        $this->cotacaoCruzeiroRepository = $cotacaoCruzeiroRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacoes/cruzeiro",
     *      summary="Get a listing of the CotacaoCruzeiros.",
     *      tags={"CotacaoCruzeiro"},
     *      description="Get all CotacaoCruzeiros",
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
     *                  @SWG\Items(ref="#/definitions/CotacaoCruzeiro")
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
        $this->cotacaoCruzeiroRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoCruzeiroRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoCruzeiros = $this->cotacaoCruzeiroRepository->all();

        return $this->sendResponse($cotacaoCruzeiros->toArray(), 'Cotacao Cruzeiros retrieved successfully');
    }

    /**
     * @param CreateCotacaoCruzeiroAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacoes/cruzeiro",
     *      summary="Store a newly created CotacaoCruzeiro in storage",
     *      tags={"CotacaoCruzeiro"},
     *      description="Store CotacaoCruzeiro",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoCruzeiro that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoCruzeiro")
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
     *                  ref="#/definitions/CotacaoCruzeiro"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoCruzeiroAPIRequest $request)
    {
        $input = $request->all();

        $cotacaoCruzeiros = $this->cotacaoCruzeiroRepository->create($input);

        return $this->sendResponse($cotacaoCruzeiros->toArray(), 'Cotacao Cruzeiro saved successfully');
    }
}
