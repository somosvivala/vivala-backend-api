<?php

namespace App\Http\Controllers;

use App\DataTables\ExpedicaoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateExpedicaoRequest;
use App\Http\Requests\UpdateExpedicaoRequest;
use App\Repositories\ExpedicaoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ExpedicaoController extends AppBaseController
{
    /** @var  ExpedicaoRepository */
    private $expedicaoRepository;

    public function __construct(ExpedicaoRepository $expedicaoRepo)
    {
        $this->expedicaoRepository = $expedicaoRepo;
    }

    /**
     * Display a listing of the Expedicao.
     *
     * @param ExpedicaoDataTable $expedicaoDataTable
     * @return Response
     */
    public function index(ExpedicaoDataTable $expedicaoDataTable)
    {
        return $expedicaoDataTable->render('expedicaos.index');
    }

    /**
     * Show the form for creating a new Expedicao.
     *
     * @return Response
     */
    public function create()
    {
        return view('expedicaos.create');
    }

    /**
     * Store a newly created Expedicao in storage.
     *
     * @param CreateExpedicaoRequest $request
     *
     * @return Response
     */
    public function store(CreateExpedicaoRequest $request)
    {
        $input = $request->all();

        $expedicao = $this->expedicaoRepository->create($input);

        Flash::success('Expedicao saved successfully.');

        return redirect(route('expedicaos.index'));
    }

    /**
     * Display the specified Expedicao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);

        if (empty($expedicao)) {
            Flash::error('Expedicao not found');

            return redirect(route('expedicaos.index'));
        }

        return view('expedicaos.show')->with('expedicao', $expedicao);
    }

    /**
     * Show the form for editing the specified Expedicao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);

        if (empty($expedicao)) {
            Flash::error('Expedicao not found');

            return redirect(route('expedicaos.index'));
        }

        return view('expedicaos.edit')->with('expedicao', $expedicao);
    }

    /**
     * Update the specified Expedicao in storage.
     *
     * @param  int              $id
     * @param UpdateExpedicaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpedicaoRequest $request)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);

        if (empty($expedicao)) {
            Flash::error('Expedicao not found');

            return redirect(route('expedicaos.index'));
        }

        $expedicao = $this->expedicaoRepository->update($request->all(), $id);

        Flash::success('Expedicao updated successfully.');

        return redirect(route('expedicaos.index'));
    }

    /**
     * Remove the specified Expedicao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);

        if (empty($expedicao)) {
            Flash::error('Expedicao not found');

            return redirect(route('expedicaos.index'));
        }

        $this->expedicaoRepository->delete($id);

        Flash::success('Expedicao deleted successfully.');

        return redirect(route('expedicaos.index'));
    }
}
