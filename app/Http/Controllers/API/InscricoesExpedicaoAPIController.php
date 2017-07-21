<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInscricoesExpedicaoAPIRequest;
use App\Http\Requests\API\UpdateInscricoesExpedicaoAPIRequest;
use App\Models\InscricoesExpedicao;
use App\Repositories\InscricoesExpedicaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InscricoesExpedicaoController
 * @package App\Http\Controllers\API
 */

class InscricoesExpedicaoAPIController extends AppBaseController
{
    /** @var  InscricoesExpedicaoRepository */
    private $inscricoesExpedicaoRepository;

    public function __construct(InscricoesExpedicaoRepository $inscricoesExpedicaoRepo)
    {
        $this->inscricoesExpedicaoRepository = $inscricoesExpedicaoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/inscricoesExpedicaos",
     *      summary="Get a listing of the InscricoesExpedicaos.",
     *      tags={"InscricoesExpedicao"},
     *      description="Get all InscricoesExpedicaos",
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
     *                  @SWG\Items(ref="#/definitions/InscricoesExpedicao")
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
        $this->inscricoesExpedicaoRepository->pushCriteria(new RequestCriteria($request));
        $this->inscricoesExpedicaoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $inscricoesExpedicaos = $this->inscricoesExpedicaoRepository->all();

        return $this->sendResponse($inscricoesExpedicaos->toArray(), 'Inscricoes Expedicaos retrieved successfully');
    }

    /**
     * @param CreateInscricoesExpedicaoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/inscricoesExpedicaos",
     *      summary="Store a newly created InscricoesExpedicao in storage",
     *      tags={"InscricoesExpedicao"},
     *      description="Store InscricoesExpedicao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InscricoesExpedicao that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InscricoesExpedicao")
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
     *                  ref="#/definitions/InscricoesExpedicao"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInscricoesExpedicaoAPIRequest $request)
    {
        $input = $request->all();

        $inscricoesExpedicaos = $this->inscricoesExpedicaoRepository->create($input);

        return $this->sendResponse($inscricoesExpedicaos->toArray(), 'Inscricoes Expedicao saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/inscricoesExpedicaos/{id}",
     *      summary="Display the specified InscricoesExpedicao",
     *      tags={"InscricoesExpedicao"},
     *      description="Get InscricoesExpedicao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricoesExpedicao",
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
     *                  ref="#/definitions/InscricoesExpedicao"
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
        /** @var InscricoesExpedicao $inscricoesExpedicao */
        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricoesExpedicao)) {
            return $this->sendError('Inscricoes Expedicao not found');
        }

        return $this->sendResponse($inscricoesExpedicao->toArray(), 'Inscricoes Expedicao retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInscricoesExpedicaoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/inscricoesExpedicaos/{id}",
     *      summary="Update the specified InscricoesExpedicao in storage",
     *      tags={"InscricoesExpedicao"},
     *      description="Update InscricoesExpedicao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricoesExpedicao",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InscricoesExpedicao that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InscricoesExpedicao")
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
     *                  ref="#/definitions/InscricoesExpedicao"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInscricoesExpedicaoAPIRequest $request)
    {
        $input = $request->all();

        /** @var InscricoesExpedicao $inscricoesExpedicao */
        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricoesExpedicao)) {
            return $this->sendError('Inscricoes Expedicao not found');
        }

        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->update($input, $id);

        return $this->sendResponse($inscricoesExpedicao->toArray(), 'InscricoesExpedicao updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/inscricoesExpedicaos/{id}",
     *      summary="Remove the specified InscricoesExpedicao from storage",
     *      tags={"InscricoesExpedicao"},
     *      description="Delete InscricoesExpedicao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricoesExpedicao",
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
        /** @var InscricoesExpedicao $inscricoesExpedicao */
        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricoesExpedicao)) {
            return $this->sendError('Inscricoes Expedicao not found');
        }

        $inscricoesExpedicao->delete();

        return $this->sendResponse($id, 'Inscricoes Expedicao deleted successfully');
    }
}
