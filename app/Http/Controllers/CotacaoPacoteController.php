<?php

namespace App\Http\Controllers;

use App\DataTables\CotacaoPacoteDataTable;
use App\Http\Requests\CreateCotacaoPacoteRequest;
use App\Http\Requests\UpdateCotacaoPacoteRequest;
use App\Repositories\CotacaoPacoteRepository;
use Flash;
use Response;

class CotacaoPacoteController extends AppBaseController
{
    /** @var CotacaoPacoteRepository */
    private $cotacaoPacoteRepository;

    public function __construct(CotacaoPacoteRepository $cotacaoPacoteRepo)
    {
        $this->cotacaoPacoteRepository = $cotacaoPacoteRepo;
    }

    /**
     * Display a listing of the CotacaoPacote.
     *
     * @param CotacaoPacoteDataTable $cotacaoPacoteDataTable
     * @return Response
     */
    public function index(CotacaoPacoteDataTable $cotacaoPacoteDataTable)
    {
        return $cotacaoPacoteDataTable->render('cotacao_pacotes.index');
    }

    /**
     * Show the form for creating a new CotacaoPacote.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotacao_pacotes.create');
    }

    /**
     * Store a newly created CotacaoPacote in storage.
     *
     * @param CreateCotacaoPacoteRequest $request
     *
     * @return Response
     */
    public function store(CreateCotacaoPacoteRequest $request)
    {
        $input = $request->all();

        $cotacaoPacote = $this->cotacaoPacoteRepository->create($input);

        Flash::success('Cotacao Pacote saved successfully.');

        return redirect(route('cotacaoPacotes.index'));
    }

    /**
     * Display the specified CotacaoPacote.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotacaoPacote = $this->cotacaoPacoteRepository->findWithoutFail($id);

        if (empty($cotacaoPacote)) {
            Flash::error('Cotacao Pacote not found');

            return redirect(route('cotacaoPacotes.index'));
        }

        return view('cotacao_pacotes.show')->with('cotacaoPacote', $cotacaoPacote);
    }

    /**
     * Show the form for editing the specified CotacaoPacote.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotacaoPacote = $this->cotacaoPacoteRepository->findWithoutFail($id);

        if (empty($cotacaoPacote)) {
            Flash::error('Cotacao Pacote not found');

            return redirect(route('cotacaoPacotes.index'));
        }

        return view('cotacao_pacotes.edit')->with('cotacaoPacote', $cotacaoPacote);
    }

    /**
     * Update the specified CotacaoPacote in storage.
     *
     * @param  int              $id
     * @param UpdateCotacaoPacoteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCotacaoPacoteRequest $request)
    {
        $cotacaoPacote = $this->cotacaoPacoteRepository->findWithoutFail($id);

        if (empty($cotacaoPacote)) {
            Flash::error('Cotacao Pacote not found');

            return redirect(route('cotacaoPacotes.index'));
        }

        $cotacaoPacote = $this->cotacaoPacoteRepository->update($request->all(), $id);

        Flash::success('Cotacao Pacote updated successfully.');

        return redirect(route('cotacaoPacotes.index'));
    }

    /**
     * Remove the specified CotacaoPacote from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cotacaoPacote = $this->cotacaoPacoteRepository->findWithoutFail($id);

        if (empty($cotacaoPacote)) {
            Flash::error('Cotacao Pacote not found');

            return redirect(route('cotacaoPacotes.index'));
        }

        $this->cotacaoPacoteRepository->delete($id);

        Flash::success('Cotacao Pacote deleted successfully.');

        return redirect(route('cotacaoPacotes.index'));
    }
}
