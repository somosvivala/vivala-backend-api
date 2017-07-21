<?php

namespace App\Http\Controllers;

use App\DataTables\InscricoesExpedicaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInscricoesExpedicaoRequest;
use App\Http\Requests\UpdateInscricoesExpedicaoRequest;
use App\Repositories\InscricoesExpedicaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InscricoesExpedicaoController extends AppBaseController
{
    /** @var  InscricoesExpedicaoRepository */
    private $inscricoesExpedicaoRepository;

    public function __construct(InscricoesExpedicaoRepository $inscricoesExpedicaoRepo)
    {
        $this->inscricoesExpedicaoRepository = $inscricoesExpedicaoRepo;
    }

    /**
     * Display a listing of the InscricoesExpedicao.
     *
     * @param InscricoesExpedicaoDataTable $inscricoesExpedicaoDataTable
     * @return Response
     */
    public function index(InscricoesExpedicaoDataTable $inscricoesExpedicaoDataTable)
    {
        return $inscricoesExpedicaoDataTable->render('inscricoes_expedicaos.index');
    }

    /**
     * Show the form for creating a new InscricoesExpedicao.
     *
     * @return Response
     */
    public function create()
    {
        return view('inscricoes_expedicaos.create');
    }

    /**
     * Store a newly created InscricoesExpedicao in storage.
     *
     * @param CreateInscricoesExpedicaoRequest $request
     *
     * @return Response
     */
    public function store(CreateInscricoesExpedicaoRequest $request)
    {
        $input = $request->all();

        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->create($input);

        Flash::success('Inscricoes Expedicao saved successfully.');

        return redirect(route('inscricoesExpedicaos.index'));
    }

    /**
     * Display the specified InscricoesExpedicao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricoesExpedicao)) {
            Flash::error('Inscricoes Expedicao not found');

            return redirect(route('inscricoesExpedicaos.index'));
        }

        return view('inscricoes_expedicaos.show')->with('inscricoesExpedicao', $inscricoesExpedicao);
    }

    /**
     * Show the form for editing the specified InscricoesExpedicao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricoesExpedicao)) {
            Flash::error('Inscricoes Expedicao not found');

            return redirect(route('inscricoesExpedicaos.index'));
        }

        return view('inscricoes_expedicaos.edit')->with('inscricoesExpedicao', $inscricoesExpedicao);
    }

    /**
     * Update the specified InscricoesExpedicao in storage.
     *
     * @param  int              $id
     * @param UpdateInscricoesExpedicaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscricoesExpedicaoRequest $request)
    {
        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricoesExpedicao)) {
            Flash::error('Inscricoes Expedicao not found');

            return redirect(route('inscricoesExpedicaos.index'));
        }

        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->update($request->all(), $id);

        Flash::success('Inscricoes Expedicao updated successfully.');

        return redirect(route('inscricoesExpedicaos.index'));
    }

    /**
     * Remove the specified InscricoesExpedicao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscricoesExpedicao = $this->inscricoesExpedicaoRepository->findWithoutFail($id);

        if (empty($inscricoesExpedicao)) {
            Flash::error('Inscricoes Expedicao not found');

            return redirect(route('inscricoesExpedicaos.index'));
        }

        $this->inscricoesExpedicaoRepository->delete($id);

        Flash::success('Inscricoes Expedicao deleted successfully.');

        return redirect(route('inscricoesExpedicaos.index'));
    }
}
