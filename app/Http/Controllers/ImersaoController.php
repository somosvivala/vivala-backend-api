<?php

namespace App\Http\Controllers;

use App\DataTables\ImersaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateImersaoRequest;
use App\Http\Requests\UpdateImersaoRequest;
use App\Repositories\ImersaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ImersaoController extends AppBaseController
{
    /** @var  ImersaoRepository */
    private $imersaoRepository;

    public function __construct(ImersaoRepository $imersaoRepo)
    {
        $this->imersaoRepository = $imersaoRepo;
    }

    /**
     * Display a listing of the Imersao.
     *
     * @param ImersaoDataTable $imersaoDataTable
     * @return Response
     */
    public function index(ImersaoDataTable $imersaoDataTable)
    {
        return $imersaoDataTable->render('imersaos.index');
    }

    /**
     * Show the form for creating a new Imersao.
     *
     * @return Response
     */
    public function create()
    {
        return view('imersaos.create');
    }

    /**
     * Store a newly created Imersao in storage.
     *
     * @param CreateImersaoRequest $request
     *
     * @return Response
     */
    public function store(CreateImersaoRequest $request)
    {
        $input = $request->all();

        $imersao = $this->imersaoRepository->create($input);

        Flash::success('Imersao saved successfully.');

        return redirect(route('imersaos.index'));
    }

    /**
     * Display the specified Imersao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao not found');

            return redirect(route('imersaos.index'));
        }

        return view('imersaos.show')->with('imersao', $imersao);
    }

    /**
     * Show the form for editing the specified Imersao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao not found');

            return redirect(route('imersaos.index'));
        }

        return view('imersaos.edit')->with('imersao', $imersao);
    }

    /**
     * Update the specified Imersao in storage.
     *
     * @param  int              $id
     * @param UpdateImersaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImersaoRequest $request)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao not found');

            return redirect(route('imersaos.index'));
        }

        $imersao = $this->imersaoRepository->update($request->all(), $id);

        Flash::success('Imersao updated successfully.');

        return redirect(route('imersaos.index'));
    }

    /**
     * Remove the specified Imersao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao not found');

            return redirect(route('imersaos.index'));
        }

        $this->imersaoRepository->delete($id);

        Flash::success('Imersao deleted successfully.');

        return redirect(route('imersaos.index'));
    }
}
