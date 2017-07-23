<?php

namespace App\Http\Controllers;

use App\DataTables\InscricaoExperienciaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInscricaoExperienciaRequest;
use App\Http\Requests\UpdateInscricaoExperienciaRequest;
use App\Repositories\InscricaoExperienciaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InscricaoExperienciaController extends AppBaseController
{
    /** @var  InscricaoExperienciaRepository */
    private $inscricaoExperienciaRepository;

    public function __construct(InscricaoExperienciaRepository $inscricaoExperienciaRepo)
    {
        $this->inscricaoExperienciaRepository = $inscricaoExperienciaRepo;
    }

    /**
     * Display a listing of the InscricaoExperiencia.
     *
     * @param InscricaoExperienciaDataTable $inscricaoExperienciaDataTable
     * @return Response
     */
    public function index(InscricaoExperienciaDataTable $inscricaoExperienciaDataTable)
    {
        return $inscricaoExperienciaDataTable->render('inscricao_experiencias.index');
    }

    /**
     * Show the form for creating a new InscricaoExperiencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('inscricao_experiencias.create');
    }

    /**
     * Store a newly created InscricaoExperiencia in storage.
     *
     * @param CreateInscricaoExperienciaRequest $request
     *
     * @return Response
     */
    public function store(CreateInscricaoExperienciaRequest $request)
    {
        $input = $request->all();

        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->create($input);

        Flash::success('Inscricao Experiencia saved successfully.');

        return redirect(route('inscricaoExperiencias.index'));
    }

    /**
     * Display the specified InscricaoExperiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->findWithoutFail($id);

        if (empty($inscricaoExperiencia)) {
            Flash::error('Inscricao Experiencia not found');

            return redirect(route('inscricaoExperiencias.index'));
        }

        return view('inscricao_experiencias.show')->with('inscricaoExperiencia', $inscricaoExperiencia);
    }

    /**
     * Show the form for editing the specified InscricaoExperiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->findWithoutFail($id);

        if (empty($inscricaoExperiencia)) {
            Flash::error('Inscricao Experiencia not found');

            return redirect(route('inscricaoExperiencias.index'));
        }

        return view('inscricao_experiencias.edit')->with('inscricaoExperiencia', $inscricaoExperiencia);
    }

    /**
     * Update the specified InscricaoExperiencia in storage.
     *
     * @param  int              $id
     * @param UpdateInscricaoExperienciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscricaoExperienciaRequest $request)
    {
        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->findWithoutFail($id);

        if (empty($inscricaoExperiencia)) {
            Flash::error('Inscricao Experiencia not found');

            return redirect(route('inscricaoExperiencias.index'));
        }

        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->update($request->all(), $id);

        Flash::success('Inscricao Experiencia updated successfully.');

        return redirect(route('inscricaoExperiencias.index'));
    }

    /**
     * Remove the specified InscricaoExperiencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscricaoExperiencia = $this->inscricaoExperienciaRepository->findWithoutFail($id);

        if (empty($inscricaoExperiencia)) {
            Flash::error('Inscricao Experiencia not found');

            return redirect(route('inscricaoExperiencias.index'));
        }

        $this->inscricaoExperienciaRepository->delete($id);

        Flash::success('Inscricao Experiencia deleted successfully.');

        return redirect(route('inscricaoExperiencias.index'));
    }
}