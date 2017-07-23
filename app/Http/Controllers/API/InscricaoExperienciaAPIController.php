<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInscricaoExperienciaAPIRequest;
use App\Http\Requests\API\UpdateInscricaoExperienciaAPIRequest;
use App\Models\InscricaoExperiencia;
use App\Repositories\InscricaoExperienciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InscricaoExperienciaController
 * @package App\Http\Controllers\API
 */

class InscricaoExperienciaAPIController extends AppBaseController
{
    /** @var  InscricaoExperienciaRepository */
    private $inscricaoExperienciaRepository;

    public function __construct(InscricaoExperienciaRepository $inscricaoExperienciaRepo)
    {
        $this->inscricaoExperienciaRepository = $inscricaoExperienciaRepo;
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
    public function store(CreateInscricaoExperienciaAPIRequest $request)
    {
        $input = $request->all();

        $inscricaoExperiencias = $this->inscricaoExperienciaRepository->create($input);

        return $this->sendResponse($inscricaoExperiencias->toArray(), 'Inscricao Experiencia saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/experiencias/{id}/inscricoes/{id}",
     *      summary="Display the specified InscricaoExperiencia",
     *      tags={"InscricaoExperiencia"},
     *      description="Get InscricaoExperiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoExperiencia",
     *          type="integer",
     *          required=true,
     *          in="path"
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
    public function show($id)
    {
        /** @var InscricaoExperiencia $inscricaoExperiencia */
        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->findWithoutFail($id);

        if (empty($inscricaoExperiencia)) {
            return $this->sendError('Inscricao Experiencia not found');
        }

        return $this->sendResponse($inscricaoExperiencia->toArray(), 'Inscricao Experiencia retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInscricaoExperienciaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/experiencias/{id}/inscricoes/{id}",
     *      summary="Update the specified InscricaoExperiencia in storage",
     *      tags={"InscricaoExperiencia"},
     *      description="Update InscricaoExperiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoExperiencia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InscricaoExperiencia that should be updated",
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
    public function update($id, UpdateInscricaoExperienciaAPIRequest $request)
    {
        $input = $request->all();

        /** @var InscricaoExperiencia $inscricaoExperiencia */
        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->findWithoutFail($id);

        if (empty($inscricaoExperiencia)) {
            return $this->sendError('Inscricao Experiencia not found');
        }

        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->update($input, $id);

        return $this->sendResponse($inscricaoExperiencia->toArray(), 'InscricaoExperiencia updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/experiencias/{id}/inscricoes/{id}",
     *      summary="Remove the specified InscricaoExperiencia from storage",
     *      tags={"InscricaoExperiencia"},
     *      description="Delete InscricaoExperiencia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoExperiencia",
     *          type="integer",
     *          required=true,
     *          in="path"
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
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var InscricaoExperiencia $inscricaoExperiencia */
        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->findWithoutFail($id);

        if (empty($inscricaoExperiencia)) {
            return $this->sendError('Inscricao Experiencia not found');
        }

        $inscricaoExperiencia->delete();

        return $this->sendResponse($id, 'Inscricao Experiencia deleted successfully');
    }
}
