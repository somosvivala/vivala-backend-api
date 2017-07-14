<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContatoGeralAPIRequest;
use App\Http\Requests\API\UpdateContatoGeralAPIRequest;
use App\Models\ContatoGeral;
use App\Repositories\ContatoGeralRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ContatoGeralController
 * @package App\Http\Controllers\API
 */

class ContatoGeralAPIController extends AppBaseController
{
    /** @var  ContatoGeralRepository */
    private $contatoGeralRepository;

    public function __construct(ContatoGeralRepository $contatoGeralRepo)
    {
        $this->contatoGeralRepository = $contatoGeralRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatoGerals",
     *      summary="Get a listing of the ContatoGerals.",
     *      tags={"ContatoGeral"},
     *      description="Get all ContatoGerals",
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
     *                  @SWG\Items(ref="#/definitions/ContatoGeral")
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
        $this->contatoGeralRepository->pushCriteria(new RequestCriteria($request));
        $this->contatoGeralRepository->pushCriteria(new LimitOffsetCriteria($request));
        $contatoGerals = $this->contatoGeralRepository->all();

        return $this->sendResponse($contatoGerals->toArray(), 'Contato Gerals retrieved successfully');
    }

    /**
     * @param CreateContatoGeralAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contatoGerals",
     *      summary="Store a newly created ContatoGeral in storage",
     *      tags={"ContatoGeral"},
     *      description="Store ContatoGeral",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContatoGeral that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContatoGeral")
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
     *                  ref="#/definitions/ContatoGeral"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContatoGeralAPIRequest $request)
    {
        $input = $request->all();

        $contatoGerals = $this->contatoGeralRepository->create($input);

        return $this->sendResponse($contatoGerals->toArray(), 'Contato Geral saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatoGerals/{id}",
     *      summary="Display the specified ContatoGeral",
     *      tags={"ContatoGeral"},
     *      description="Get ContatoGeral",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoGeral",
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
     *                  ref="#/definitions/ContatoGeral"
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
        /** @var ContatoGeral $contatoGeral */
        $contatoGeral = $this->contatoGeralRepository->findWithoutFail($id);

        if (empty($contatoGeral)) {
            return $this->sendError('Contato Geral not found');
        }

        return $this->sendResponse($contatoGeral->toArray(), 'Contato Geral retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContatoGeralAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contatoGerals/{id}",
     *      summary="Update the specified ContatoGeral in storage",
     *      tags={"ContatoGeral"},
     *      description="Update ContatoGeral",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoGeral",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContatoGeral that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContatoGeral")
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
     *                  ref="#/definitions/ContatoGeral"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContatoGeralAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContatoGeral $contatoGeral */
        $contatoGeral = $this->contatoGeralRepository->findWithoutFail($id);

        if (empty($contatoGeral)) {
            return $this->sendError('Contato Geral not found');
        }

        $contatoGeral = $this->contatoGeralRepository->update($input, $id);

        return $this->sendResponse($contatoGeral->toArray(), 'ContatoGeral updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contatoGerals/{id}",
     *      summary="Remove the specified ContatoGeral from storage",
     *      tags={"ContatoGeral"},
     *      description="Delete ContatoGeral",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoGeral",
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
        /** @var ContatoGeral $contatoGeral */
        $contatoGeral = $this->contatoGeralRepository->findWithoutFail($id);

        if (empty($contatoGeral)) {
            return $this->sendError('Contato Geral not found');
        }

        $contatoGeral->delete();

        return $this->sendResponse($id, 'Contato Geral deleted successfully');
    }
}