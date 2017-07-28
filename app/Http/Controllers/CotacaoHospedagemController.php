<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\CotacaoHospedagemDataTable;
use App\Repositories\CotacaoHospedagemRepository;
use App\Http\Requests\CreateCotacaoHospedagemRequest;
use App\Http\Requests\UpdateCotacaoHospedagemRequest;

class CotacaoHospedagemController extends AppBaseController
{
    /** @var CotacaoHospedagemRepository */
    private $cotacaoHospedagemRepository;

    public function __construct(CotacaoHospedagemRepository $cotacaoHospedagemRepo)
    {
        $this->cotacaoHospedagemRepository = $cotacaoHospedagemRepo;
    }

    /**
     * Display a listing of the CotacaoHospedagem.
     *
     * @param CotacaoHospedagemDataTable $cotacaoHospedagemDataTable
     * @return Response
     */
    public function index(CotacaoHospedagemDataTable $cotacaoHospedagemDataTable)
    {
        return $cotacaoHospedagemDataTable->render('cotacao_hospedagems.index');
    }

    /**
     * Show the form for creating a new CotacaoHospedagem.
     *
     * @return Response
     */
    public function create()
    {
        return view('cotacao_hospedagems.create');
    }

    /**
     * Store a newly created CotacaoHospedagem in storage.
     *
     * @param CreateCotacaoHospedagemRequest $request
     *
     * @return Response
     */
    public function store(CreateCotacaoHospedagemRequest $request)
    {
        $input = $request->all();

        $cotacaoHospedagem = $this->cotacaoHospedagemRepository->create($input);

        Flash::success('Cotacao Hospedagem saved successfully.');

        return redirect(route('cotacaoHospedagems.index'));
    }

    /**
     * Display the specified CotacaoHospedagem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cotacaoHospedagem = $this->cotacaoHospedagemRepository->findWithoutFail($id);

        if (empty($cotacaoHospedagem)) {
            Flash::error('Cotacao Hospedagem not found');

            return redirect(route('cotacaoHospedagems.index'));
        }

        return view('cotacao_hospedagems.show')->with('cotacaoHospedagem', $cotacaoHospedagem);
    }

    /**
     * Show the form for editing the specified CotacaoHospedagem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cotacaoHospedagem = $this->cotacaoHospedagemRepository->findWithoutFail($id);

        if (empty($cotacaoHospedagem)) {
            Flash::error('Cotacao Hospedagem not found');

            return redirect(route('cotacaoHospedagems.index'));
        }

        return view('cotacao_hospedagems.edit')->with('cotacaoHospedagem', $cotacaoHospedagem);
    }

    /**
     * Update the specified CotacaoHospedagem in storage.
     *
     * @param  int              $id
     * @param UpdateCotacaoHospedagemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCotacaoHospedagemRequest $request)
    {
        $cotacaoHospedagem = $this->cotacaoHospedagemRepository->findWithoutFail($id);

        if (empty($cotacaoHospedagem)) {
            Flash::error('Cotacao Hospedagem not found');

            return redirect(route('cotacaoHospedagems.index'));
        }

        $cotacaoHospedagem = $this->cotacaoHospedagemRepository->update($request->all(), $id);

        Flash::success('Cotacao Hospedagem updated successfully.');

        return redirect(route('cotacaoHospedagems.index'));
    }

    /**
     * Remove the specified CotacaoHospedagem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cotacaoHospedagem = $this->cotacaoHospedagemRepository->findWithoutFail($id);

        if (empty($cotacaoHospedagem)) {
            Flash::error('Cotacao Hospedagem not found');

            return redirect(route('cotacaoHospedagems.index'));
        }

        $this->cotacaoHospedagemRepository->delete($id);

        Flash::success('Cotacao Hospedagem deleted successfully.');

        return redirect(route('cotacaoHospedagems.index'));
    }
}
