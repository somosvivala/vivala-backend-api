<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateInscricaoExperienciaAPIRequest;
use App\Models\InscricaoExperiencia;
use App\Repositories\ExperienciaRepository;
use App\Repositories\InscricaoExperienciaRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InscricaoExperienciaController.
 */
class InscricaoExperienciaAPIController extends AppBaseController
{
    /** @var InscricaoExperienciaRepository */
    private $inscricaoExperienciaRepository;
    private $experienciaRepository;

    public function __construct(InscricaoExperienciaRepository $inscricaoExperienciaRepo, ExperienciaRepository $experienciaRepo)
    {
        $this->inscricaoExperienciaRepository = $inscricaoExperienciaRepo;
        $this->experienciaRepository = $experienciaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/experiencias/{id}/inscricoes",
     *      summary="Get a listing of the InscricaoExperiencias.",
     *      tags={"InscricaoExperiencia"},
     *      description="Get all InscricaoExperiencias",
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
     *                  @SWG\Items(ref="#/definitions/InscricaoExperiencia")
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
        $this->inscricaoExperienciaRepository->pushCriteria(new RequestCriteria($request));
        $this->inscricaoExperienciaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $inscricaoExperiencias = $this->inscricaoExperienciaRepository->all();

        return $this->sendResponse($inscricaoExperiencias->toArray(), 'Inscricao Experiencias retrieved successfully');
    }

    /**
     * @param CreateInscricaoExperienciaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/experiencias/{id}/inscricoes",
     *      summary="Store a newly created InscricaoExperiencia in storage",
     *      tags={"InscricaoExperiencia"},
     *      description="Store InscricaoExperiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InscricaoExperiencia that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InscricaoExperiencia")
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
     *                  ref="#/definitions/InscricaoExperiencia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInscricaoExperienciaAPIRequest $request, $idExp)
    {
        $Experiencia = $this->experienciaRepository->findWithoutFail($idExp);

        if (empty($Experiencia)) {
            return $this->sendError('Experiencia not found');
        }

        $input = array_merge($request->all(), ['experiencia_id' => $idExp]);

        /** @var InscricaoExperiencia $inscricaoExperiencia */
        $inscricaoExperiencias = $this->inscricaoExperienciaRepository->create($input);

        return $this->sendResponse($inscricaoExperiencias->toArray(), 'Inscricao Experiencia saved successfully');
    }
}
