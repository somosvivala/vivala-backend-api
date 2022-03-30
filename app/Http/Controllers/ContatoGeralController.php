<?php

namespace App\Http\Controllers;

use App\DataTables\ContatoGeralDataTable;
use App\Http\Requests\CreateContatoGeralRequest;
use App\Http\Requests\UpdateContatoGeralRequest;
use App\Repositories\ContatoGeralRepository;
use Flash;
use Response;

class ContatoGeralController extends AppBaseController
{
    /** @var ContatoGeralRepository */
    private $contatoGeralRepository;

    public function __construct(ContatoGeralRepository $contatoGeralRepo)
    {
        $this->contatoGeralRepository = $contatoGeralRepo;
    }

    /**
     * Display a listing of the ContatoGeral.
     *
     * @param  ContatoGeralDataTable  $contatoGeralDataTable
     * @return Response
     */
    public function index(ContatoGeralDataTable $contatoGeralDataTable)
    {
        return $contatoGeralDataTable->render('contato_gerals.index');
    }

    /**
     * Show the form for creating a new ContatoGeral.
     *
     * @return Response
     */
    public function create()
    {
        return view('contato_gerals.create');
    }

    /**
     * Store a newly created ContatoGeral in storage.
     *
     * @param  CreateContatoGeralRequest  $request
     * @return Response
     */
    public function store(CreateContatoGeralRequest $request)
    {
        $input = $request->all();

        $contatoGeral = $this->contatoGeralRepository->create($input);

        Flash::success('Contato Geral saved successfully.');

        return redirect(route('contatoGerals.index'));
    }

    /**
     * Display the specified ContatoGeral.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contatoGeral = $this->contatoGeralRepository->findWithoutFail($id);

        if (empty($contatoGeral)) {
            Flash::error('Contato Geral not found');

            return redirect(route('contatoGerals.index'));
        }

        return view('contato_gerals.show')->with('contatoGeral', $contatoGeral);
    }

    /**
     * Show the form for editing the specified ContatoGeral.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contatoGeral = $this->contatoGeralRepository->findWithoutFail($id);

        if (empty($contatoGeral)) {
            Flash::error('Contato Geral not found');

            return redirect(route('contatoGerals.index'));
        }

        return view('contato_gerals.edit')->with('contatoGeral', $contatoGeral);
    }

    /**
     * Update the specified ContatoGeral in storage.
     *
     * @param  int  $id
     * @param  UpdateContatoGeralRequest  $request
     * @return Response
     */
    public function update($id, UpdateContatoGeralRequest $request)
    {
        $contatoGeral = $this->contatoGeralRepository->findWithoutFail($id);

        if (empty($contatoGeral)) {
            Flash::error('Contato Geral not found');

            return redirect(route('contatoGerals.index'));
        }

        $contatoGeral = $this->contatoGeralRepository->update($request->all(), $id);

        Flash::success('Contato Geral updated successfully.');

        return redirect(route('contatoGerals.index'));
    }

    /**
     * Remove the specified ContatoGeral from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $contatoGeral = $this->contatoGeralRepository->findWithoutFail($id);

        if (empty($contatoGeral)) {
            Flash::error('Contato Geral not found');

            return redirect(route('contatoGerals.index'));
        }

        $this->contatoGeralRepository->delete($id);

        Flash::success('Contato Geral deleted successfully.');

        return redirect(route('contatoGerals.index'));
    }
}
