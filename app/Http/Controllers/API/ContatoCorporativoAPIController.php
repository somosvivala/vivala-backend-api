<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateContatoCorporativoAPIRequest;
use App\Models\ContatoCorporativo;
use App\Repositories\ContatoCorporativoRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ContatoCorporativoController.
 */
class ContatoCorporativoAPIController extends AppBaseController
{
    /** @var ContatoCorporativoRepository */
    private $contatoCorporativoRepository;

    public function __construct(ContatoCorporativoRepository $contatoCorporativoRepo)
    {
        $this->contatoCorporativoRepository = $contatoCorporativoRepo;
    }

    /**
     * @param  Request  $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contatos/corporativo",
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
     * @param  CreateContatoCorporativoAPIRequest  $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contatos/corporativo",
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
}
