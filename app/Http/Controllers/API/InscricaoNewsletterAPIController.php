<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInscricaoNewsletterAPIRequest;
use App\Http\Requests\API\UpdateInscricaoNewsletterAPIRequest;
use App\Models\InscricaoNewsletter;
use App\Repositories\InscricaoNewsletterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InscricaoNewsletterController
 * @package App\Http\Controllers\API
 */

class InscricaoNewsletterAPIController extends AppBaseController
{
    /** @var  InscricaoNewsletterRepository */
    private $inscricaoNewsletterRepository;

    public function __construct(InscricaoNewsletterRepository $inscricaoNewsletterRepo)
    {
        $this->inscricaoNewsletterRepository = $inscricaoNewsletterRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/inscricaoNewsletters",
     *      summary="Get a listing of the InscricaoNewsletters.",
     *      tags={"InscricaoNewsletter"},
     *      description="Get all InscricaoNewsletters",
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
     *                  @SWG\Items(ref="#/definitions/InscricaoNewsletter")
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
        $this->inscricaoNewsletterRepository->pushCriteria(new RequestCriteria($request));
        $this->inscricaoNewsletterRepository->pushCriteria(new LimitOffsetCriteria($request));
        $inscricaoNewsletters = $this->inscricaoNewsletterRepository->all();

        return $this->sendResponse($inscricaoNewsletters->toArray(), 'Inscricao Newsletters retrieved successfully');
    }

    /**
     * @param CreateInscricaoNewsletterAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/inscricaoNewsletters",
     *      summary="Store a newly created InscricaoNewsletter in storage",
     *      tags={"InscricaoNewsletter"},
     *      description="Store InscricaoNewsletter",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InscricaoNewsletter that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InscricaoNewsletter")
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
     *                  ref="#/definitions/InscricaoNewsletter"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInscricaoNewsletterAPIRequest $request)
    {
        $input = $request->all();

        $inscricaoNewsletters = $this->inscricaoNewsletterRepository->create($input);

        return $this->sendResponse($inscricaoNewsletters->toArray(), 'Inscricao Newsletter saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/inscricaoNewsletters/{id}",
     *      summary="Display the specified InscricaoNewsletter",
     *      tags={"InscricaoNewsletter"},
     *      description="Get InscricaoNewsletter",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoNewsletter",
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
     *                  ref="#/definitions/InscricaoNewsletter"
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
        /** @var InscricaoNewsletter $inscricaoNewsletter */
        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->findWithoutFail($id);

        if (empty($inscricaoNewsletter)) {
            return $this->sendError('Inscricao Newsletter not found');
        }

        return $this->sendResponse($inscricaoNewsletter->toArray(), 'Inscricao Newsletter retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInscricaoNewsletterAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/inscricaoNewsletters/{id}",
     *      summary="Update the specified InscricaoNewsletter in storage",
     *      tags={"InscricaoNewsletter"},
     *      description="Update InscricaoNewsletter",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoNewsletter",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InscricaoNewsletter that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InscricaoNewsletter")
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
     *                  ref="#/definitions/InscricaoNewsletter"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInscricaoNewsletterAPIRequest $request)
    {
        $input = $request->all();

        /** @var InscricaoNewsletter $inscricaoNewsletter */
        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->findWithoutFail($id);

        if (empty($inscricaoNewsletter)) {
            return $this->sendError('Inscricao Newsletter not found');
        }

        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->update($input, $id);

        return $this->sendResponse($inscricaoNewsletter->toArray(), 'InscricaoNewsletter updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/inscricaoNewsletters/{id}",
     *      summary="Remove the specified InscricaoNewsletter from storage",
     *      tags={"InscricaoNewsletter"},
     *      description="Delete InscricaoNewsletter",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InscricaoNewsletter",
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
        /** @var InscricaoNewsletter $inscricaoNewsletter */
        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->findWithoutFail($id);

        if (empty($inscricaoNewsletter)) {
            return $this->sendError('Inscricao Newsletter not found');
        }

        $inscricaoNewsletter->delete();

        return $this->sendResponse($id, 'Inscricao Newsletter deleted successfully');
    }
}
