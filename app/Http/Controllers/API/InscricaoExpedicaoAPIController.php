<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateInscricaoExpedicaoAPIRequest;
use App\Http\Requests\API\UpdateInscricaoExpedicaoAPIRequest;
use App\Models\InscricaoExpedicao;
use App\Repositories\ExpedicaoRepository;
use App\Repositories\InscricaoExpedicaoRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InscricaoExpedicaoController
 * @package App\Http\Controllers\API
 */

class InscricaoExpedicaoAPIController extends AppBaseController
{
    /** @var  InscricaoExpedicaoRepository */
    private $inscricaoExpedicaoRepository;
    private $expedicaoRepository;

    public function __construct(InscricaoExpedicaoRepository $inscricaoExpedicaoRepo, ExpedicaoRepository $expedicaoRepo)
    {
        $this->inscricaoExpedicaoRepository = $inscricaoExpedicaoRepo;
        $this->expedicaoRepository = $expedicaoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/expedicoes/{id}/inscricoes",
     *      summary="Get a listing of the InscricaoExpedicaos.",
     *      tags={"InscricaoExpedicao"},
     *      description="Get all InscricaoExpedicaos",
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
     *                  @SWG\Items(ref="#/definitions/InscricaoExpedicao")
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
        $this->inscricaoExpedicaoRepository->pushCriteria(new RequestCriteria($request));
        $this->inscricaoExpedicaoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $inscricaoExpedicaos = $this->inscricaoExpedicaoRepository->all();

        return $this->sendResponse($inscricaoExpedicaos->toArray(), 'Inscricao Expedicaos retrieved successfully');
    }

    /**
     * @param CreateInscricaoExpedicaoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/expedicoes/{id}/inscricoes",
     *      summary="Store a newly created InscricaoExpedicao in storage",
     *      tags={"InscricaoExpedicao"},
     *      description="Store InscricaoExpedicao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InscricaoExpedicao that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InscricaoExpedicao")
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
     *                  ref="#/definitions/InscricaoExpedicao"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInscricaoExpedicaoAPIRequest $request, $idExp)
    {
        $Expedicao = $this->expedicaoRepository->findWithoutFail($idExp);

        if (empty($Expedicao)) {
            return $this->sendError('Expedicao not found');
        }

        $request->request->add(['expedicao_id' => $Expedicao->id]);
        $input = $request->all();

        $inscricaoExpedicaos = $this->inscricaoExpedicaoRepository->create($input);

        return $this->sendResponse($inscricaoExpedicaos->toArray(), 'Inscricao Expedicao saved successfully');
    }

}
