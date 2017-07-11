<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContatoCorporativoAPIRequest;
use App\Http\Requests\API\UpdateContatoCorporativoAPIRequest;
use App\Models\ContatoCorporativo;
use App\Repositories\ContatoCorporativoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ContatoCorporativoController
 * @package App\Http\Controllers\API
 */

class ContatoCorporativoAPIController extends AppBaseController
{
    /** @var  ContatoCorporativoRepository */
    private $contatoCorporativoRepository;

    public function __construct(ContatoCorporativoRepository $contatoCorporativoRepo)
    {
        $this->contatoCorporativoRepository = $contatoCorporativoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatoCorporativos",
     *      summary="Get a listing of the ContatoCorporativos.",
     *      tags={"ContatoCorporativo"},
     *      description="Get all ContatoCorporativos",
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
     *                  @SWG\Items(ref="#/definitions/ContatoCorporativo")
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
        $this->contatoCorporativoRepository->pushCriteria(new RequestCriteria($request));
        $this->contatoCorporativoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $contatoCorporativos = $this->contatoCorporativoRepository->all();

        return $this->sendResponse($contatoCorporativos->toArray(), 'Contato Corporativos retrieved successfully');
    }

    /**
     * @param CreateContatoCorporativoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contatoCorporativos",
     *      summary="Store a newly created ContatoCorporativo in storage",
     *      tags={"ContatoCorporativo"},
     *      description="Store ContatoCorporativo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContatoCorporativo that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContatoCorporativo")
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
     *                  ref="#/definitions/ContatoCorporativo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContatoCorporativoAPIRequest $request)
    {
        $input = $request->all();

        $contatoCorporativos = $this->contatoCorporativoRepository->create($input);

        return $this->sendResponse($contatoCorporativos->toArray(), 'Contato Corporativo saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatoCorporativos/{id}",
     *      summary="Display the specified ContatoCorporativo",
     *      tags={"ContatoCorporativo"},
     *      description="Get ContatoCorporativo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoCorporativo",
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
     *                  ref="#/definitions/ContatoCorporativo"
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
        /** @var ContatoCorporativo $contatoCorporativo */
        $contatoCorporativo = $this->contatoCorporativoRepository->findWithoutFail($id);

        if (empty($contatoCorporativo)) {
            return $this->sendError('Contato Corporativo not found');
        }

        return $this->sendResponse($contatoCorporativo->toArray(), 'Contato Corporativo retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContatoCorporativoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contatoCorporativos/{id}",
     *      summary="Update the specified ContatoCorporativo in storage",
     *      tags={"ContatoCorporativo"},
     *      description="Update ContatoCorporativo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoCorporativo",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContatoCorporativo that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContatoCorporativo")
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
     *                  ref="#/definitions/ContatoCorporativo"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContatoCorporativoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContatoCorporativo $contatoCorporativo */
        $contatoCorporativo = $this->contatoCorporativoRepository->findWithoutFail($id);

        if (empty($contatoCorporativo)) {
            return $this->sendError('Contato Corporativo not found');
        }

        $contatoCorporativo = $this->contatoCorporativoRepository->update($input, $id);

        return $this->sendResponse($contatoCorporativo->toArray(), 'ContatoCorporativo updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contatoCorporativos/{id}",
     *      summary="Remove the specified ContatoCorporativo from storage",
     *      tags={"ContatoCorporativo"},
     *      description="Delete ContatoCorporativo",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContatoCorporativo",
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
        /** @var ContatoCorporativo $contatoCorporativo */
        $contatoCorporativo = $this->contatoCorporativoRepository->findWithoutFail($id);

        if (empty($contatoCorporativo)) {
            return $this->sendError('Contato Corporativo not found');
        }

        $contatoCorporativo->delete();

        return $this->sendResponse($id, 'Contato Corporativo deleted successfully');
    }
}
