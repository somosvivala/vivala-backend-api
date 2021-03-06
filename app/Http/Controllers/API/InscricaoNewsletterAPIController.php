<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use App\Models\InscricaoNewsletter;
use App\Http\Controllers\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use App\Repositories\InscricaoNewsletterRepository;
use App\Http\Requests\API\CreateInscricaoNewsletterAPIRequest;

/**
 * Class InscricaoNewsletterController.
 */
class InscricaoNewsletterAPIController extends AppBaseController
{
    /** @var InscricaoNewsletterRepository */
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
     *      path="/newsletter",
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
     *      path="/newsletter",
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
}
