<?php

namespace App\Http\Controllers;

use App\DataTables\ContatoAgenteDataTable;
use App\Http\Requests\CreateContatoAgenteRequest;
use App\Http\Requests\UpdateContatoAgenteRequest;
use App\Repositories\ContatoAgenteRepository;
use Flash;
use Response;

class ContatoAgenteController extends AppBaseController
{
    /** @var ContatoAgenteRepository */
    private $contatoAgenteRepository;

    public function __construct(ContatoAgenteRepository $contatoAgenteRepo)
    {
        $this->contatoAgenteRepository = $contatoAgenteRepo;
    }

    /**
     * Display a listing of the ContatoAgente.
     *
     * @param  ContatoAgenteDataTable  $contatoAgenteDataTable
     * @return Response
     */
    public function index(ContatoAgenteDataTable $contatoAgenteDataTable)
    {
        return $contatoAgenteDataTable->render('contato_agentes.index');
    }

    /**
     * Show the form for creating a new ContatoAgente.
     *
     * @return Response
     */
    public function create()
    {
        return view('contato_agentes.create');
    }

    /**
     * Store a newly created ContatoAgente in storage.
     *
     * @param  CreateContatoAgenteRequest  $request
     * @return Response
     */
    public function store(CreateContatoAgenteRequest $request)
    {
        $input = $request->all();

        $contatoAgente = $this->contatoAgenteRepository->create($input);

        Flash::success('Contato Agente saved successfully.');

        return redirect(route('contatoAgentes.index'));
    }

    /**
     * Display the specified ContatoAgente.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contatoAgente = $this->contatoAgenteRepository->findWithoutFail($id);

        if (empty($contatoAgente)) {
            Flash::error('Contato Agente not found');

            return redirect(route('contatoAgentes.index'));
        }

        return view('contato_agentes.show')->with('contatoAgente', $contatoAgente);
    }

    /**
     * Show the form for editing the specified ContatoAgente.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contatoAgente = $this->contatoAgenteRepository->findWithoutFail($id);

        if (empty($contatoAgente)) {
            Flash::error('Contato Agente not found');

            return redirect(route('contatoAgentes.index'));
        }

        return view('contato_agentes.edit')->with('contatoAgente', $contatoAgente);
    }

    /**
     * Update the specified ContatoAgente in storage.
     *
     * @param  int  $id
     * @param  UpdateContatoAgenteRequest  $request
     * @return Response
     */
    public function update($id, UpdateContatoAgenteRequest $request)
    {
        $contatoAgente = $this->contatoAgenteRepository->findWithoutFail($id);

        if (empty($contatoAgente)) {
            Flash::error('Contato Agente not found');

            return redirect(route('contatoAgentes.index'));
        }

        $contatoAgente = $this->contatoAgenteRepository->update($request->all(), $id);

        Flash::success('Contato Agente updated successfully.');

        return redirect(route('contatoAgentes.index'));
    }

    /**
     * Remove the specified ContatoAgente from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $contatoAgente = $this->contatoAgenteRepository->findWithoutFail($id);

        if (empty($contatoAgente)) {
            Flash::error('Contato Agente not found');

            return redirect(route('contatoAgentes.index'));
        }

        $this->contatoAgenteRepository->delete($id);

        Flash::success('Contato Agente deleted successfully.');

        return redirect(route('contatoAgentes.index'));
    }
}
