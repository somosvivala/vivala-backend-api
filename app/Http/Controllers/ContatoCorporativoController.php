<?php

namespace App\Http\Controllers;

use App\DataTables\ContatoCorporativoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContatoCorporativoRequest;
use App\Http\Requests\UpdateContatoCorporativoRequest;
use App\Repositories\ContatoCorporativoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContatoCorporativoController extends AppBaseController
{
    /** @var  ContatoCorporativoRepository */
    private $contatoCorporativoRepository;

    public function __construct(ContatoCorporativoRepository $contatoCorporativoRepo)
    {
        $this->contatoCorporativoRepository = $contatoCorporativoRepo;
    }

    /**
     * Display a listing of the ContatoCorporativo.
     *
     * @param ContatoCorporativoDataTable $contatoCorporativoDataTable
     * @return Response
     */
    public function index(ContatoCorporativoDataTable $contatoCorporativoDataTable)
    {
        return $contatoCorporativoDataTable->render('contato_corporativos.index');
    }

    /**
     * Show the form for creating a new ContatoCorporativo.
     *
     * @return Response
     */
    public function create()
    {
        return view('contato_corporativos.create');
    }

    /**
     * Store a newly created ContatoCorporativo in storage.
     *
     * @param CreateContatoCorporativoRequest $request
     *
     * @return Response
     */
    public function store(CreateContatoCorporativoRequest $request)
    {
        $input = $request->all();

        $contatoCorporativo = $this->contatoCorporativoRepository->create($input);

        Flash::success('Contato Corporativo saved successfully.');

        return redirect(route('contatoCorporativos.index'));
    }

    /**
     * Display the specified ContatoCorporativo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contatoCorporativo = $this->contatoCorporativoRepository->findWithoutFail($id);

        if (empty($contatoCorporativo)) {
            Flash::error('Contato Corporativo not found');

            return redirect(route('contatoCorporativos.index'));
        }

        return view('contato_corporativos.show')->with('contatoCorporativo', $contatoCorporativo);
    }

    /**
     * Show the form for editing the specified ContatoCorporativo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contatoCorporativo = $this->contatoCorporativoRepository->findWithoutFail($id);

        if (empty($contatoCorporativo)) {
            Flash::error('Contato Corporativo not found');

            return redirect(route('contatoCorporativos.index'));
        }

        return view('contato_corporativos.edit')->with('contatoCorporativo', $contatoCorporativo);
    }

    /**
     * Update the specified ContatoCorporativo in storage.
     *
     * @param  int              $id
     * @param UpdateContatoCorporativoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContatoCorporativoRequest $request)
    {
        $contatoCorporativo = $this->contatoCorporativoRepository->findWithoutFail($id);

        if (empty($contatoCorporativo)) {
            Flash::error('Contato Corporativo not found');

            return redirect(route('contatoCorporativos.index'));
        }

        $contatoCorporativo = $this->contatoCorporativoRepository->update($request->all(), $id);

        Flash::success('Contato Corporativo updated successfully.');

        return redirect(route('contatoCorporativos.index'));
    }

    /**
     * Remove the specified ContatoCorporativo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contatoCorporativo = $this->contatoCorporativoRepository->findWithoutFail($id);

        if (empty($contatoCorporativo)) {
            Flash::error('Contato Corporativo not found');

            return redirect(route('contatoCorporativos.index'));
        }

        $this->contatoCorporativoRepository->delete($id);

        Flash::success('Contato Corporativo deleted successfully.');

        return redirect(route('contatoCorporativos.index'));
    }
}
