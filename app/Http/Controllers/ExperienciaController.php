<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\ExperienciaDataTable;
use App\Repositories\ExperienciaRepository;
use App\Http\Requests\CreateExperienciaRequest;
use App\Http\Requests\UpdateExperienciaRequest;

class ExperienciaController extends AppBaseController
{
    /** @var ExperienciaRepository */
    private $experienciaRepository;

    public function __construct(ExperienciaRepository $experienciaRepo)
    {
        $this->experienciaRepository = $experienciaRepo;
    }

    /**
     * Display a listing of the Experiencia.
     *
     * @param ExperienciaDataTable $experienciaDataTable
     * @return Response
     */
    public function index(ExperienciaDataTable $experienciaDataTable)
    {
        return $experienciaDataTable->render('experiencias.index');
    }

    /**
     * Show the form for creating a new Experiencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('experiencias.create');
    }

    /**
     * Store a newly created Experiencia in storage.
     *
     * @param CreateExperienciaRequest $request
     *
     * @return Response
     */
    public function store(CreateExperienciaRequest $request)
    {
        $input = $request->all();

        $experiencia = $this->experienciaRepository->create($input);

        Flash::success('Experiencia saved successfully.');

        return redirect(route('experiencias.index'));
    }

    /**
     * Display the specified Experiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia not found');

            return redirect(route('experiencias.index'));
        }

        return view('experiencias.show')->with('experiencia', $experiencia);
    }

    /**
     * Show the form for editing the specified Experiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia not found');

            return redirect(route('experiencias.index'));
        }

        return view('experiencias.edit')->with('experiencia', $experiencia);
    }

    /**
     * Update the specified Experiencia in storage.
     *
     * @param  int              $id
     * @param UpdateExperienciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExperienciaRequest $request)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia not found');

            return redirect(route('experiencias.index'));
        }

        $experiencia = $this->experienciaRepository->update($request->all(), $id);

        Flash::success('Experiencia updated successfully.');

        return redirect(route('experiencias.index'));
    }

    /**
     * Remove the specified Experiencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia not found');

            return redirect(route('experiencias.index'));
        }

        $this->experienciaRepository->delete($id);

        Flash::success('Experiencia deleted successfully.');

        return redirect(route('experiencias.index'));
    }
}
