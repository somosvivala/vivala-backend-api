<?php

namespace App\Http\Controllers\API;

use Response;
use Illuminate\Http\Request;
use App\Models\ContatoAgente;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ContatoAgenteRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use App\Http\Requests\API\CreateContatoAgenteAPIRequest;

/**
 * Class ContatoAgenteController.
 */
class ContatoAgenteAPIController extends AppBaseController
{
    /** @var ContatoAgenteRepository */
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
     *      path="/contatos/agente",
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
     *      path="/contatos/agente",
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
}
