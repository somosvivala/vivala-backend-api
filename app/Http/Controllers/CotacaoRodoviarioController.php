<?php

namespace App\Http\Controllers;

use App\DataTables\CotacaoRodoviarioDataTable;
use App\Http\Requests\CreateCotacaoRodoviarioRequest;
use App\Http\Requests\UpdateCotacaoRodoviarioRequest;
use App\Repositories\CotacaoRodoviarioRepository;
use Flash;
use Response;

class CotacaoRodoviarioController extends AppBaseController
{
    /** @var CotacaoRodoviarioRepository */
    private $cotacaoRodoviarioRepository;

    public function __construct(CotacaoRodoviarioRepository $cotacaoRodoviarioRepo)
    {
        $this->cotacaoRodoviarioRepository = $cotacaoRodoviarioRepo;
    }

    /**
     * Display a listing of the CotacaoRodoviario.
     *
     * @param CotacaoRodoviarioDataTable $cotacaoRodoviarioDataTable
     * @return Response
     */
    public function index(CotacaoRodoviarioDataTable $cotacaoRodoviarioDataTable)
    {
        return $cotacaoRodoviarioDataTable->render('cotacao_rodoviarios.index');
    }

    /**
     * Show the form for creating a new CotacaoRodoviario.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotacao_rodoviarios.create');
    }

    /**
     * Store a newly created CotacaoRodoviario in storage.
     *
     * @param CreateCotacaoRodoviarioRequest $request
     *
     * @return Response
     */
    public function store(CreateCotacaoRodoviarioRequest $request)
    {
        $input = $request->all();

        $cotacaoRodoviario = $this->cotacaoRodoviarioRepository->create($input);

        Flash::success('Cotacao Rodoviario saved successfully.');

        return redirect(route('cotacaoRodoviarios.index'));
    }

    /**
     * Display the specified CotacaoRodoviario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotacaoRodoviario = $this->cotacaoRodoviarioRepository->findWithoutFail($id);

        if (empty($cotacaoRodoviario)) {
            Flash::error('Cotacao Rodoviario not found');

            return redirect(route('cotacaoRodoviarios.index'));
        }

        return view('cotacao_rodoviarios.show')->with('cotacaoRodoviario', $cotacaoRodoviario);
    }

    /**
     * Show the form for editing the specified CotacaoRodoviario.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotacaoRodoviario = $this->cotacaoRodoviarioRepository->findWithoutFail($id);

        if (empty($cotacaoRodoviario)) {
            Flash::error('Cotacao Rodoviario not found');

            return redirect(route('cotacaoRodoviarios.index'));
        }

        return view('cotacao_rodoviarios.edit')->with('cotacaoRodoviario', $cotacaoRodoviario);
    }

    /**
     * Update the specified CotacaoRodoviario in storage.
     *
     * @param  int              $id
     * @param UpdateCotacaoRodoviarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCotacaoRodoviarioRequest $request)
    {
        $cotacaoRodoviario = $this->cotacaoRodoviarioRepository->findWithoutFail($id);

        if (empty($cotacaoRodoviario)) {
            Flash::error('Cotacao Rodoviario not found');

            return redirect(route('cotacaoRodoviarios.index'));
        }

        $cotacaoRodoviario = $this->cotacaoRodoviarioRepository->update($request->all(), $id);

        Flash::success('Cotacao Rodoviario updated successfully.');

        return redirect(route('cotacaoRodoviarios.index'));
    }

    /**
     * Remove the specified CotacaoRodoviario from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cotacaoRodoviario = $this->cotacaoRodoviarioRepository->findWithoutFail($id);

        if (empty($cotacaoRodoviario)) {
            Flash::error('Cotacao Rodoviario not found');

            return redirect(route('cotacaoRodoviarios.index'));
        }

        $this->cotacaoRodoviarioRepository->delete($id);

        Flash::success('Cotacao Rodoviario deleted successfully.');

        return redirect(route('cotacaoRodoviarios.index'));
    }
}
