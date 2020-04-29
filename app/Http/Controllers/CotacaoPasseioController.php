<?php

namespace App\Http\Controllers;

use App\DataTables\CotacaoPasseioDataTable;
use App\Http\Requests\CreateCotacaoPasseioRequest;
use App\Http\Requests\UpdateCotacaoPasseioRequest;
use App\Repositories\CotacaoPasseioRepository;
use Flash;
use Response;

class CotacaoPasseioController extends AppBaseController
{
    /** @var CotacaoPasseioRepository */
    private $cotacaoPasseioRepository;

    public function __construct(CotacaoPasseioRepository $cotacaoPasseioRepo)
    {
        $this->cotacaoPasseioRepository = $cotacaoPasseioRepo;
    }

    /**
     * Display a listing of the CotacaoPasseio.
     *
     * @param CotacaoPasseioDataTable $cotacaoPasseioDataTable
     * @return Response
     */
    public function index(CotacaoPasseioDataTable $cotacaoPasseioDataTable)
    {
        return $cotacaoPasseioDataTable->render('cotacao_passeios.index');
    }

    /**
     * Show the form for creating a new CotacaoPasseio.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotacao_passeios.create');
    }

    /**
     * Store a newly created CotacaoPasseio in storage.
     *
     * @param CreateCotacaoPasseioRequest $request
     *
     * @return Response
     */
    public function store(CreateCotacaoPasseioRequest $request)
    {
        $input = $request->all();

        $cotacaoPasseio = $this->cotacaoPasseioRepository->create($input);

        Flash::success('Cotacao Passeio saved successfully.');

        return redirect(route('cotacaoPasseios.index'));
    }

    /**
     * Display the specified CotacaoPasseio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotacaoPasseio = $this->cotacaoPasseioRepository->findWithoutFail($id);

        if (empty($cotacaoPasseio)) {
            Flash::error('Cotacao Passeio not found');

            return redirect(route('cotacaoPasseios.index'));
        }

        return view('cotacao_passeios.show')->with('cotacaoPasseio', $cotacaoPasseio);
    }

    /**
     * Show the form for editing the specified CotacaoPasseio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotacaoPasseio = $this->cotacaoPasseioRepository->findWithoutFail($id);

        if (empty($cotacaoPasseio)) {
            Flash::error('Cotacao Passeio not found');

            return redirect(route('cotacaoPasseios.index'));
        }

        return view('cotacao_passeios.edit')->with('cotacaoPasseio', $cotacaoPasseio);
    }

    /**
     * Update the specified CotacaoPasseio in storage.
     *
     * @param  int              $id
     * @param UpdateCotacaoPasseioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCotacaoPasseioRequest $request)
    {
        $cotacaoPasseio = $this->cotacaoPasseioRepository->findWithoutFail($id);

        if (empty($cotacaoPasseio)) {
            Flash::error('Cotacao Passeio not found');

            return redirect(route('cotacaoPasseios.index'));
        }

        $cotacaoPasseio = $this->cotacaoPasseioRepository->update($request->all(), $id);

        Flash::success('Cotacao Passeio updated successfully.');

        return redirect(route('cotacaoPasseios.index'));
    }

    /**
     * Remove the specified CotacaoPasseio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cotacaoPasseio = $this->cotacaoPasseioRepository->findWithoutFail($id);

        if (empty($cotacaoPasseio)) {
            Flash::error('Cotacao Passeio not found');

            return redirect(route('cotacaoPasseios.index'));
        }

        $this->cotacaoPasseioRepository->delete($id);

        Flash::success('Cotacao Passeio deleted successfully.');

        return redirect(route('cotacaoPasseios.index'));
    }
}
