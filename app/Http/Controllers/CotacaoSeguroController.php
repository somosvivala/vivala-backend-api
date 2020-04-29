<?php

namespace App\Http\Controllers;

use App\DataTables\CotacaoSeguroDataTable;
use App\Http\Requests\CreateCotacaoSeguroRequest;
use App\Http\Requests\UpdateCotacaoSeguroRequest;
use App\Repositories\CotacaoSeguroRepository;
use Flash;
use Response;

class CotacaoSeguroController extends AppBaseController
{
    /** @var CotacaoSeguroRepository */
    private $cotacaoSeguroRepository;

    public function __construct(CotacaoSeguroRepository $cotacaoSeguroRepo)
    {
        $this->cotacaoSeguroRepository = $cotacaoSeguroRepo;
    }

    /**
     * Display a listing of the CotacaoSeguro.
     *
     * @param CotacaoSeguroDataTable $cotacaoSeguroDataTable
     * @return Response
     */
    public function index(CotacaoSeguroDataTable $cotacaoSeguroDataTable)
    {
        return $cotacaoSeguroDataTable->render('cotacao_seguros.index');
    }

    /**
     * Show the form for creating a new CotacaoSeguro.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotacao_seguros.create');
    }

    /**
     * Store a newly created CotacaoSeguro in storage.
     *
     * @param CreateCotacaoSeguroRequest $request
     *
     * @return Response
     */
    public function store(CreateCotacaoSeguroRequest $request)
    {
        $input = $request->all();

        $cotacaoSeguro = $this->cotacaoSeguroRepository->create($input);

        Flash::success('Cotacao Seguro saved successfully.');

        return redirect(route('cotacaoSeguros.index'));
    }

    /**
     * Display the specified CotacaoSeguro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotacaoSeguro = $this->cotacaoSeguroRepository->findWithoutFail($id);

        if (empty($cotacaoSeguro)) {
            Flash::error('Cotacao Seguro not found');

            return redirect(route('cotacaoSeguros.index'));
        }

        return view('cotacao_seguros.show')->with('cotacaoSeguro', $cotacaoSeguro);
    }

    /**
     * Show the form for editing the specified CotacaoSeguro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotacaoSeguro = $this->cotacaoSeguroRepository->findWithoutFail($id);

        if (empty($cotacaoSeguro)) {
            Flash::error('Cotacao Seguro not found');

            return redirect(route('cotacaoSeguros.index'));
        }

        return view('cotacao_seguros.edit')->with('cotacaoSeguro', $cotacaoSeguro);
    }

    /**
     * Update the specified CotacaoSeguro in storage.
     *
     * @param  int              $id
     * @param UpdateCotacaoSeguroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCotacaoSeguroRequest $request)
    {
        $cotacaoSeguro = $this->cotacaoSeguroRepository->findWithoutFail($id);

        if (empty($cotacaoSeguro)) {
            Flash::error('Cotacao Seguro not found');

            return redirect(route('cotacaoSeguros.index'));
        }

        $cotacaoSeguro = $this->cotacaoSeguroRepository->update($request->all(), $id);

        Flash::success('Cotacao Seguro updated successfully.');

        return redirect(route('cotacaoSeguros.index'));
    }

    /**
     * Remove the specified CotacaoSeguro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cotacaoSeguro = $this->cotacaoSeguroRepository->findWithoutFail($id);

        if (empty($cotacaoSeguro)) {
            Flash::error('Cotacao Seguro not found');

            return redirect(route('cotacaoSeguros.index'));
        }

        $this->cotacaoSeguroRepository->delete($id);

        Flash::success('Cotacao Seguro deleted successfully.');

        return redirect(route('cotacaoSeguros.index'));
    }
}
