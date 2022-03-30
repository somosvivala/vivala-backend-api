<?php

namespace App\Http\Controllers;

use App\DataTables\CotacaoAereoDataTable;
use App\Http\Requests\CreateCotacaoAereoRequest;
use App\Http\Requests\UpdateCotacaoAereoRequest;
use App\Repositories\CotacaoAereoRepository;
use Flash;
use Response;

class CotacaoAereoController extends AppBaseController
{
    /** @var CotacaoAereoRepository */
    private $cotacaoAereoRepository;

    public function __construct(CotacaoAereoRepository $cotacaoAereoRepo)
    {
        $this->cotacaoAereoRepository = $cotacaoAereoRepo;
    }

    /**
     * Display a listing of the CotacaoAereo.
     *
     * @param  CotacaoAereoDataTable  $cotacaoAereoDataTable
     * @return Response
     */
    public function index(CotacaoAereoDataTable $cotacaoAereoDataTable)
    {
        return $cotacaoAereoDataTable->render('cotacao_aereos.index');
    }

    /**
     * Show the form for creating a new CotacaoAereo.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotacao_aereos.create');
    }

    /**
     * Store a newly created CotacaoAereo in storage.
     *
     * @param  CreateCotacaoAereoRequest  $request
     * @return Response
     */
    public function store(CreateCotacaoAereoRequest $request)
    {
        $input = $request->all();

        $cotacaoAereo = $this->cotacaoAereoRepository->create($input);

        Flash::success('Cotacao Aereo saved successfully.');

        return redirect(route('cotacaoAereos.index'));
    }

    /**
     * Display the specified CotacaoAereo.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $cotacaoAereo = $this->cotacaoAereoRepository->findWithoutFail($id);

        if (empty($cotacaoAereo)) {
            Flash::error('Cotacao Aereo not found');

            return redirect(route('cotacaoAereos.index'));
        }

        return view('cotacao_aereos.show')->with('cotacaoAereo', $cotacaoAereo);
    }

    /**
     * Show the form for editing the specified CotacaoAereo.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cotacaoAereo = $this->cotacaoAereoRepository->findWithoutFail($id);

        if (empty($cotacaoAereo)) {
            Flash::error('Cotacao Aereo not found');

            return redirect(route('cotacaoAereos.index'));
        }

        return view('cotacao_aereos.edit')->with('cotacaoAereo', $cotacaoAereo);
    }

    /**
     * Update the specified CotacaoAereo in storage.
     *
     * @param  int  $id
     * @param  UpdateCotacaoAereoRequest  $request
     * @return Response
     */
    public function update($id, UpdateCotacaoAereoRequest $request)
    {
        $cotacaoAereo = $this->cotacaoAereoRepository->findWithoutFail($id);

        if (empty($cotacaoAereo)) {
            Flash::error('Cotacao Aereo not found');

            return redirect(route('cotacaoAereos.index'));
        }

        $cotacaoAereo = $this->cotacaoAereoRepository->update($request->all(), $id);

        Flash::success('Cotacao Aereo updated successfully.');

        return redirect(route('cotacaoAereos.index'));
    }

    /**
     * Remove the specified CotacaoAereo from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $cotacaoAereo = $this->cotacaoAereoRepository->findWithoutFail($id);

        if (empty($cotacaoAereo)) {
            Flash::error('Cotacao Aereo not found');

            return redirect(route('cotacaoAereos.index'));
        }

        $this->cotacaoAereoRepository->delete($id);

        Flash::success('Cotacao Aereo deleted successfully.');

        return redirect(route('cotacaoAereos.index'));
    }
}
