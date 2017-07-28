<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\InscricaoNewsletterDataTable;
use App\Repositories\InscricaoNewsletterRepository;
use App\Http\Requests\CreateInscricaoNewsletterRequest;
use App\Http\Requests\UpdateInscricaoNewsletterRequest;

class InscricaoNewsletterController extends AppBaseController
{
    /** @var InscricaoNewsletterRepository */
    private $inscricaoNewsletterRepository;

    public function __construct(InscricaoNewsletterRepository $inscricaoNewsletterRepo)
    {
        $this->inscricaoNewsletterRepository = $inscricaoNewsletterRepo;
    }

    /**
     * Display a listing of the InscricaoNewsletter.
     *
     * @param InscricaoNewsletterDataTable $inscricaoNewsletterDataTable
     * @return Response
     */
    public function index(InscricaoNewsletterDataTable $inscricaoNewsletterDataTable)
    {
        return $inscricaoNewsletterDataTable->render('inscricao_newsletters.index');
    }

    /**
     * Show the form for creating a new InscricaoNewsletter.
     *
     * @return Response
     */
    public function create()
    {
        return view('inscricao_newsletters.create');
    }

    /**
     * Store a newly created InscricaoNewsletter in storage.
     *
     * @param CreateInscricaoNewsletterRequest $request
     *
     * @return Response
     */
    public function store(CreateInscricaoNewsletterRequest $request)
    {
        $input = $request->all();

        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->create($input);

        Flash::success('Inscricao Newsletter saved successfully.');

        return redirect(route('inscricaoNewsletters.index'));
    }

    /**
     * Display the specified InscricaoNewsletter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->findWithoutFail($id);

        if (empty($inscricaoNewsletter)) {
            Flash::error('Inscricao Newsletter not found');

            return redirect(route('inscricaoNewsletters.index'));
        }

        return view('inscricao_newsletters.show')->with('inscricaoNewsletter', $inscricaoNewsletter);
    }

    /**
     * Show the form for editing the specified InscricaoNewsletter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->findWithoutFail($id);

        if (empty($inscricaoNewsletter)) {
            Flash::error('Inscricao Newsletter not found');

            return redirect(route('inscricaoNewsletters.index'));
        }

        return view('inscricao_newsletters.edit')->with('inscricaoNewsletter', $inscricaoNewsletter);
    }

    /**
     * Update the specified InscricaoNewsletter in storage.
     *
     * @param  int              $id
     * @param UpdateInscricaoNewsletterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInscricaoNewsletterRequest $request)
    {
        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->findWithoutFail($id);

        if (empty($inscricaoNewsletter)) {
            Flash::error('Inscricao Newsletter not found');

            return redirect(route('inscricaoNewsletters.index'));
        }

        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->update($request->all(), $id);

        Flash::success('Inscricao Newsletter updated successfully.');

        return redirect(route('inscricaoNewsletters.index'));
    }

    /**
     * Remove the specified InscricaoNewsletter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inscricaoNewsletter = $this->inscricaoNewsletterRepository->findWithoutFail($id);

        if (empty($inscricaoNewsletter)) {
            Flash::error('Inscricao Newsletter not found');

            return redirect(route('inscricaoNewsletters.index'));
        }

        $this->inscricaoNewsletterRepository->delete($id);

        Flash::success('Inscricao Newsletter deleted successfully.');

        return redirect(route('inscricaoNewsletters.index'));
    }
}
