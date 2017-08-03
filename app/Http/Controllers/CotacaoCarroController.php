<?php

namespace App\Http\Controllers;

use App\DataTables\CotacaoCarroDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCotacaoCarroRequest;
use App\Http\Requests\UpdateCotacaoCarroRequest;
use App\Repositories\CotacaoCarroRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CotacaoCarroController extends AppBaseController
{
    /** @var  CotacaoCarroRepository */
    private $cotacaoCarroRepository;

    public function __construct(CotacaoCarroRepository $cotacaoCarroRepo)
    {
        $this->cotacaoCarroRepository = $cotacaoCarroRepo;
    }

    /**
     * Display a listing of the CotacaoCarro.
     *
     * @param CotacaoCarroDataTable $cotacaoCarroDataTable
     * @return Response
     */
    public function index(CotacaoCarroDataTable $cotacaoCarroDataTable)
    {
        return $cotacaoCarroDataTable->render('cotacao_carros.index');
    }

    /**
     * Show the form for creating a new CotacaoCarro.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotacao_carros.create');
    }

    /**
     * Store a newly created CotacaoCarro in storage.
     *
     * @param CreateCotacaoCarroRequest $request
     *
     * @return Response
     */
    public function store(CreateCotacaoCarroRequest $request)
    {
        $input = $request->all();

        $cotacaoCarro = $this->cotacaoCarroRepository->create($input);

        Flash::success('Cotacao Carro saved successfully.');

        return redirect(route('cotacaoCarros.index'));
    }

    /**
     * Display the specified CotacaoCarro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotacaoCarro = $this->cotacaoCarroRepository->findWithoutFail($id);

        if (empty($cotacaoCarro)) {
            Flash::error('Cotacao Carro not found');

            return redirect(route('cotacaoCarros.index'));
        }

        return view('cotacao_carros.show')->with('cotacaoCarro', $cotacaoCarro);
    }

    /**
     * Show the form for editing the specified CotacaoCarro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotacaoCarro = $this->cotacaoCarroRepository->findWithoutFail($id);

        if (empty($cotacaoCarro)) {
            Flash::error('Cotacao Carro not found');

            return redirect(route('cotacaoCarros.index'));
        }

        return view('cotacao_carros.edit')->with('cotacaoCarro', $cotacaoCarro);
    }

    /**
     * Update the specified CotacaoCarro in storage.
     *
     * @param  int              $id
     * @param UpdateCotacaoCarroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCotacaoCarroRequest $request)
    {
        $cotacaoCarro = $this->cotacaoCarroRepository->findWithoutFail($id);

        if (empty($cotacaoCarro)) {
            Flash::error('Cotacao Carro not found');

            return redirect(route('cotacaoCarros.index'));
        }

        $cotacaoCarro = $this->cotacaoCarroRepository->update($request->all(), $id);

        Flash::success('Cotacao Carro updated successfully.');

        return redirect(route('cotacaoCarros.index'));
    }

    /**
     * Remove the specified CotacaoCarro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cotacaoCarro = $this->cotacaoCarroRepository->findWithoutFail($id);

        if (empty($cotacaoCarro)) {
            Flash::error('Cotacao Carro not found');

            return redirect(route('cotacaoCarros.index'));
        }

        $this->cotacaoCarroRepository->delete($id);

        Flash::success('Cotacao Carro deleted successfully.');

        return redirect(route('cotacaoCarros.index'));
    }
}
