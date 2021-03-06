<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\ContatoGeral;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ContatoGeralRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use App\Http\Requests\API\CreateContatoGeralAPIRequest;

/**
 * Class ContatoGeralController.
 */
class ContatoGeralAPIController extends AppBaseController
{
    /** @var ContatoGeralRepository */
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
     *      path="/contatos/geral",
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
     *      path="/contatos/geral",
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
}
