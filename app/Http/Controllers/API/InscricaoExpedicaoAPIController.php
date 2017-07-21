<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInscricaoExpedicaoAPIRequest;
use App\Http\Requests\API\UpdateInscricaoExpedicaoAPIRequest;
use App\Models\InscricaoExpedicao;
use App\Repositories\InscricaoExpedicaoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
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

    public function __construct(InscricaoExpedicaoRepository $inscricaoExpedicaoRepo)
    {
        $this->inscricaoExpedicaoRepository = $inscricaoExpedicaoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/inscricaoExpedicaos",
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
     *      path="/inscricaoExpedicaos",
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
    public function store(CreateInscricaoExpedicaoAPIRequest $request)
    {
        $input = $request->all();

        $inscricaoExpedicaos = $this->inscricaoExpedicaoRepository->create($input);

        return $this->sendResponse($inscricaoExpedicaos->toArray(), 'Inscricao Expedicao saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/inscricaoExpedicaos/{id}",
     *      summary="Display the specified InscricaoExpedicao",
     *      tags={"InscricaoExpedicao"},
     *      description="Get InscricaoExpedicao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoExpedicao",
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
    public function show($id)
    {
        /** @var InscricaoExpedicao $inscricaoExpedicao */
        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricaoExpedicao)) {
            return $this->sendError('Inscricao Expedicao not found');
        }

        return $this->sendResponse($inscricaoExpedicao->toArray(), 'Inscricao Expedicao retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInscricaoExpedicaoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/inscricaoExpedicaos/{id}",
     *      summary="Update the specified InscricaoExpedicao in storage",
     *      tags={"InscricaoExpedicao"},
     *      description="Update InscricaoExpedicao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoExpedicao",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InscricaoExpedicao that should be updated",
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
    public function update($id, UpdateInscricaoExpedicaoAPIRequest $request)
    {
        $input = $request->all();

        /** @var InscricaoExpedicao $inscricaoExpedicao */
        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricaoExpedicao)) {
            return $this->sendError('Inscricao Expedicao not found');
        }

        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->update($input, $id);

        return $this->sendResponse($inscricaoExpedicao->toArray(), 'InscricaoExpedicao updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/inscricaoExpedicaos/{id}",
     *      summary="Remove the specified InscricaoExpedicao from storage",
     *      tags={"InscricaoExpedicao"},
     *      description="Delete InscricaoExpedicao",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoExpedicao",
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
        /** @var InscricaoExpedicao $inscricaoExpedicao */
        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricaoExpedicao)) {
            return $this->sendError('Inscricao Expedicao not found');
        }

        $inscricaoExpedicao->delete();

        return $this->sendResponse($id, 'Inscricao Expedicao deleted successfully');
    }
}
