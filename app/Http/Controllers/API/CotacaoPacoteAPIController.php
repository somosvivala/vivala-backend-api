<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCotacaoPacoteAPIRequest;
use App\Http\Requests\API\UpdateCotacaoPacoteAPIRequest;
use App\Models\CotacaoPacote;
use App\Repositories\CotacaoPacoteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CotacaoPacoteController
 * @package App\Http\Controllers\API
 */

class CotacaoPacoteAPIController extends AppBaseController
{
    /** @var  CotacaoPacoteRepository */
    private $cotacaoPacoteRepository;

    public function __construct(CotacaoPacoteRepository $cotacaoPacoteRepo)
    {
        $this->cotacaoPacoteRepository = $cotacaoPacoteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacaoPacotes",
     *      summary="Get a listing of the CotacaoPacotes.",
     *      tags={"CotacaoPacote"},
     *      description="Get all CotacaoPacotes",
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
     *                  @SWG\Items(ref="#/definitions/CotacaoPacote")
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
        $this->cotacaoPacoteRepository->pushCriteria(new RequestCriteria($request));
        $this->cotacaoPacoteRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cotacaoPacotes = $this->cotacaoPacoteRepository->all();

        return $this->sendResponse($cotacaoPacotes->toArray(), 'Cotacao Pacotes retrieved successfully');
    }

    /**
     * @param CreateCotacaoPacoteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/cotacaoPacotes",
     *      summary="Store a newly created CotacaoPacote in storage",
     *      tags={"CotacaoPacote"},
     *      description="Store CotacaoPacote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoPacote that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoPacote")
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
     *                  ref="#/definitions/CotacaoPacote"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCotacaoPacoteAPIRequest $request)
    {
        $input = $request->all();

        $cotacaoPacotes = $this->cotacaoPacoteRepository->create($input);

        return $this->sendResponse($cotacaoPacotes->toArray(), 'Cotacao Pacote saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/cotacaoPacotes/{id}",
     *      summary="Display the specified CotacaoPacote",
     *      tags={"CotacaoPacote"},
     *      description="Get CotacaoPacote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CotacaoPacote",
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
     *                  ref="#/definitions/CotacaoPacote"
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
        /** @var CotacaoPacote $cotacaoPacote */
        $cotacaoPacote = $this->cotacaoPacoteRepository->findWithoutFail($id);

        if (empty($cotacaoPacote)) {
            return $this->sendError('Cotacao Pacote not found');
        }

        return $this->sendResponse($cotacaoPacote->toArray(), 'Cotacao Pacote retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCotacaoPacoteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cotacaoPacotes/{id}",
     *      summary="Update the specified CotacaoPacote in storage",
     *      tags={"CotacaoPacote"},
     *      description="Update CotacaoPacote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CotacaoPacote",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CotacaoPacote that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CotacaoPacote")
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
     *                  ref="#/definitions/CotacaoPacote"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCotacaoPacoteAPIRequest $request)
    {
        $input = $request->all();

        /** @var CotacaoPacote $cotacaoPacote */
        $cotacaoPacote = $this->cotacaoPacoteRepository->findWithoutFail($id);

        if (empty($cotacaoPacote)) {
            return $this->sendError('Cotacao Pacote not found');
        }

        $cotacaoPacote = $this->cotacaoPacoteRepository->update($input, $id);

        return $this->sendResponse($cotacaoPacote->toArray(), 'CotacaoPacote updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/cotacaoPacotes/{id}",
     *      summary="Remove the specified CotacaoPacote from storage",
     *      tags={"CotacaoPacote"},
     *      description="Delete CotacaoPacote",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CotacaoPacote",
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
        /** @var CotacaoPacote $cotacaoPacote */
        $cotacaoPacote = $this->cotacaoPacoteRepository->findWithoutFail($id);

        if (empty($cotacaoPacote)) {
            return $this->sendError('Cotacao Pacote not found');
        }

        $cotacaoPacote->delete();

        return $this->sendResponse($id, 'Cotacao Pacote deleted successfully');
    }
}
