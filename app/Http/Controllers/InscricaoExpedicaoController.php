<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Repositories\ExpedicaoRepository;
use App\DataTables\InscricaoExpedicaoDataTable;
use App\DataTables\Scopes\InscricaoPorExpedicaoId;
use App\Repositories\InscricaoExpedicaoRepository;
use App\Http\Requests\CreateInscricaoExpedicaoRequest;
use App\Http\Requests\UpdateInscricaoExpedicaoRequest;

class InscricaoExpedicaoController extends AppBaseController
{
    /** @var InscricaoExpedicaoRepository */
    private $inscricaoExpedicaoRepository;
    private $expedicaoRepository;

    public function __construct(InscricaoExpedicaoRepository $inscricaoExpedicaoRepo, ExpedicaoRepository $expedicaoRepo)
    {
        $this->inscricaoExpedicaoRepository = $inscricaoExpedicaoRepo;
        $this->expedicaoRepository = $expedicaoRepo;
    }

    /**
     * Display a listing of the InscricaoExpedicao.
     *
     * @param InscricaoExpedicaoDataTable $inscricaoExpedicaoDataTable
     * @return Response
     */
    public function index(InscricaoExpedicaoDataTable $inscricaoExpedicaoDataTable)
    {
        return $inscricaoExpedicaoDataTable->render('inscricao_expedicaos.index');
    }

    /**
     * Show the form for creating a new InscricaoExpedicao.
     *
     * @return Response
     */
    public function create()
    {
        return view('inscricao_expedicaos.create');
    }

    /**
     * Store a newly created InscricaoExpedicao in storage.
     *
     * @param CreateInscricaoExpedicaoRequest $request
     *
     * @return Response
     */
    public function store(CreateInscricaoExpedicaoRequest $request)
    {
        $input = $request->all();

        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->create($input);

        Flash::success('Inscricao Expedicao saved successfully.');

        return redirect(route('inscricaoExpedicaos.index'));
    }

    /**
     * Display the specified InscricaoExpedicao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricaoExpedicao)) {
            Flash::error('Inscricao Expedicao not found');

            return redirect(route('inscricaoExpedicaos.index'));
        }

        return view('inscricao_expedicaos.show')->with('inscricaoExpedicao', $inscricaoExpedicao);
    }

    /**
     * Show the form for editing the specified InscricaoExpedicao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricaoExpedicao)) {
            Flash::error('Inscricao Expedicao not found');

            return redirect(route('inscricaoExpedicaos.index'));
        }

        return view('inscricao_expedicaos.edit')->with('inscricaoExpedicao', $inscricaoExpedicao);
    }

    /**
     * Update the specified InscricaoExpedicao in storage.
     *
     * @param  int              $id
     * @param UpdateInscricaoExpedicaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscricaoExpedicaoRequest $request)
    {
        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricaoExpedicao)) {
            Flash::error('Inscricao Expedicao not found');

            return redirect(route('inscricaoExpedicaos.index'));
        }

        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->update($request->all(), $id);

        Flash::success('Inscricao Expedicao updated successfully.');

        return redirect(route('inscricaoExpedicaos.index'));
    }

    /**
     * Remove the specified InscricaoExpedicao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscricaoExpedicao = $this->inscricaoExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricaoExpedicao)) {
            Flash::error('Inscricao Expedicao not found');

            return redirect(route('inscricaoExpedicaos.index'));
        }

        $this->inscricaoExpedicaoRepository->delete($id);

        Flash::success('Inscricao Expedicao deleted successfully.');

        return redirect(route('inscricaoExpedicaos.index'));
    }

    /**
     * Metodo para retornar a datatable de inscricoes de Expedicoes de 1 Expedicao.
     *
     * @param InscricaoExpedicaoDataTable $datatable
     * @param mixed $expedicao_id
     */
    public function getInscricoes(InscricaoExpedicaoDataTable $datatable, $expedicao_id)
    {

        //Testa se a expedicao existe, se não redireciona para o indice de expedicoes
        $expedicao = $this->expedicaoRepository->findWithoutFail($expedicao_id);
        if (empty($expedicao)) {
            Flash::error('Expedicao not found');

            return redirect(route('expedicaos.index'));
        }

        //adiciona a Scope que filtra pela expedicao
        return $datatable->addScope(new InscricaoPorExpedicaoId($expedicao_id))

            //metodo render é analogo ao view->make(), aceita um segundo parametro array
            ->render('inscricao_expedicaos.lista_por_expedicao', [
                'Expedicao' => $expedicao,
            ]);
    }
}
