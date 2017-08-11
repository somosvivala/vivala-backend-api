<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\CotacaoCruzeiroDataTable;
use App\Repositories\CotacaoCruzeiroRepository;
use App\Http\Requests\CreateCotacaoCruzeiroRequest;
use App\Http\Requests\UpdateCotacaoCruzeiroRequest;

class CotacaoCruzeiroController extends AppBaseController
{
    /** @var CotacaoCruzeiroRepository */
    private $cotacaoCruzeiroRepository;

    public function __construct(CotacaoCruzeiroRepository $cotacaoCruzeiroRepo)
    {
        $this->cotacaoCruzeiroRepository = $cotacaoCruzeiroRepo;
    }

    /**
     * Display a listing of the CotacaoCruzeiro.
     *
     * @param CotacaoCruzeiroDataTable $cotacaoCruzeiroDataTable
     * @return Response
     */
    public function index(CotacaoCruzeiroDataTable $cotacaoCruzeiroDataTable)
    {
        return $cotacaoCruzeiroDataTable->render('cotacao_cruzeiros.index');
    }

    /**
     * Show the form for creating a new CotacaoCruzeiro.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotacao_cruzeiros.create');
    }

    /**
     * Store a newly created CotacaoCruzeiro in storage.
     *
     * @param CreateCotacaoCruzeiroRequest $request
     *
     * @return Response
     */
    public function store(CreateCotacaoCruzeiroRequest $request)
    {
        $input = $request->all();

        $cotacaoCruzeiro = $this->cotacaoCruzeiroRepository->create($input);

        Flash::success('Cotacao Cruzeiro saved successfully.');

        return redirect(route('cotacaoCruzeiros.index'));
    }

    /**
     * Display the specified CotacaoCruzeiro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotacaoCruzeiro = $this->cotacaoCruzeiroRepository->findWithoutFail($id);

        if (empty($cotacaoCruzeiro)) {
            Flash::error('Cotacao Cruzeiro not found');

            return redirect(route('cotacaoCruzeiros.index'));
        }

        return view('cotacao_cruzeiros.show')->with('cotacaoCruzeiro', $cotacaoCruzeiro);
    }

    /**
     * Show the form for editing the specified CotacaoCruzeiro.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotacaoCruzeiro = $this->cotacaoCruzeiroRepository->findWithoutFail($id);

        if (empty($cotacaoCruzeiro)) {
            Flash::error('Cotacao Cruzeiro not found');

            return redirect(route('cotacaoCruzeiros.index'));
        }

        return view('cotacao_cruzeiros.edit')->with('cotacaoCruzeiro', $cotacaoCruzeiro);
    }

    /**
     * Update the specified CotacaoCruzeiro in storage.
     *
     * @param  int              $id
     * @param UpdateCotacaoCruzeiroRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCotacaoCruzeiroRequest $request)
    {
        $cotacaoCruzeiro = $this->cotacaoCruzeiroRepository->findWithoutFail($id);

        if (empty($cotacaoCruzeiro)) {
            Flash::error('Cotacao Cruzeiro not found');

            return redirect(route('cotacaoCruzeiros.index'));
        }

        $cotacaoCruzeiro = $this->cotacaoCruzeiroRepository->update($request->all(), $id);

        Flash::success('Cotacao Cruzeiro updated successfully.');

        return redirect(route('cotacaoCruzeiros.index'));
    }

    /**
     * Remove the specified CotacaoCruzeiro from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cotacaoCruzeiro = $this->cotacaoCruzeiroRepository->findWithoutFail($id);

        if (empty($cotacaoCruzeiro)) {
            Flash::error('Cotacao Cruzeiro not found');

            return redirect(route('cotacaoCruzeiros.index'));
        }

        $this->cotacaoCruzeiroRepository->delete($id);

        Flash::success('Cotacao Cruzeiro deleted successfully.');

        return redirect(route('cotacaoCruzeiros.index'));
    }
}
