<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContatoAgenteAPIRequest;
use App\Http\Requests\API\UpdateContatoAgenteAPIRequest;
use App\Models\ContatoAgente;
use App\Repositories\ContatoAgenteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ContatoAgenteController
 * @package App\Http\Controllers\API
 */

class ContatoAgenteAPIController extends AppBaseController
{
    /** @var  ContatoAgenteRepository */
    private $contatoAgenteRepository;

    public function __construct(ContatoAgenteRepository $contatoAgenteRepo)
    {
        $this->contatoAgenteRepository = $contatoAgenteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatoAgentes",
     *      summary="Get a listing of the ContatoAgentes.",
     *      tags={"ContatoAgente"},
     *      description="Get all ContatoAgentes",
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
     *                  @SWG\Items(ref="#/definitions/ContatoAgente")
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
        $this->contatoAgenteRepository->pushCriteria(new RequestCriteria($request));
        $this->contatoAgenteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $contatoAgentes = $this->contatoAgenteRepository->all();

        return $this->sendResponse($contatoAgentes->toArray(), 'Contato Agentes retrieved successfully');
    }

    /**
     * @param CreateContatoAgenteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contatoAgentes",
     *      summary="Store a newly created ContatoAgente in storage",
     *      tags={"ContatoAgente"},
     *      description="Store ContatoAgente",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContatoAgente that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContatoAgente")
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
     *                  ref="#/definitions/ContatoAgente"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContatoAgenteAPIRequest $request)
    {
        $input = $request->all();

        $contatoAgentes = $this->contatoAgenteRepository->create($input);

        return $this->sendResponse($contatoAgentes->toArray(), 'Contato Agente saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatoAgentes/{id}",
     *      summary="Display the specified ContatoAgente",
     *      tags={"ContatoAgente"},
     *      description="Get ContatoAgente",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoAgente",
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
     *                  ref="#/definitions/ContatoAgente"
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
        /** @var ContatoAgente $contatoAgente */
        $contatoAgente = $this->contatoAgenteRepository->findWithoutFail($id);

        if (empty($contatoAgente)) {
            return $this->sendError('Contato Agente not found');
        }

        return $this->sendResponse($contatoAgente->toArray(), 'Contato Agente retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContatoAgenteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contatoAgentes/{id}",
     *      summary="Update the specified ContatoAgente in storage",
     *      tags={"ContatoAgente"},
     *      description="Update ContatoAgente",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoAgente",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContatoAgente that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContatoAgente")
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
     *                  ref="#/definitions/ContatoAgente"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContatoAgenteAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContatoAgente $contatoAgente */
        $contatoAgente = $this->contatoAgenteRepository->findWithoutFail($id);

        if (empty($contatoAgente)) {
            return $this->sendError('Contato Agente not found');
        }

        $contatoAgente = $this->contatoAgenteRepository->update($input, $id);

        return $this->sendResponse($contatoAgente->toArray(), 'ContatoAgente updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contatoAgentes/{id}",
     *      summary="Remove the specified ContatoAgente from storage",
     *      tags={"ContatoAgente"},
     *      description="Delete ContatoAgente",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoAgente",
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
        /** @var ContatoAgente $contatoAgente */
        $contatoAgente = $this->contatoAgenteRepository->findWithoutFail($id);

        if (empty($contatoAgente)) {
            return $this->sendError('Contato Agente not found');
        }

        $contatoAgente->delete();

        return $this->sendResponse($id, 'Contato Agente deleted successfully');
    }
}
