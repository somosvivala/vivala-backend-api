<?php

namespace App\Http\Controllers;

use App\DataTables\AgenteDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests;
use App\Http\Requests\CreateAgenteRequest;
use App\Http\Requests\CreateFotoAgenteRequest;
use App\Http\Requests\UpdateAgenteRequest;
use App\Repositories\AgenteRepository;
use App\Repositories\FotoRepository;
use Flash;
use Response;

class AgenteController extends AppBaseController
{
    /** @var  AgenteRepository */
    private $agenteRepository;

    /** @var  FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo, AgenteRepository $agenteRepo)
    {
        $this->fotoRepository = $fotoRepo;
        $this->agenteRepository = $agenteRepo;
    }

    /**
     * Display a listing of the Agente.
     *
     * @param AgenteDataTable $agenteDataTable
     * @return Response
     */
    public function index(AgenteDataTable $agenteDataTable)
    {
        return $agenteDataTable->render('agentes.index');
    }

    /**
     * Show the form for creating a new Agente.
     *
     * @return Response
     */
    public function create()
    {
        return view('agentes.create');
    }

    /**
     * Store a newly created Agente in storage.
     *
     * @param CreateAgenteRequest $request
     *
     * @return Response
     */
    public function store(CreateAgenteRequest $request)
    {
        $input = $request->all();

        $agente = $this->agenteRepository->create($input);

        return redirect("agentes/".$agente->id."/foto");
    }

    /**
     * Display the specified Agente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);

        if (empty($agente)) {
            Flash::error('Agente not found');

            return redirect(route('agentes.index'));
        }

        return view('agentes.show')->with('agente', $agente);
    }

    /**
     * Show the form for editing the specified Agente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);

        if (empty($agente)) {
            Flash::error('Agente not found');

            return redirect(route('agentes.index'));
        }

        return view('agentes.edit')->with('agente', $agente);
    }

    /**
     * Update the specified Agente in storage.
     *
     * @param  int              $id
     * @param UpdateAgenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgenteRequest $request)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);

        if (empty($agente)) {
            Flash::error('Agente not found');

            return redirect(route('agentes.index'));
        }

        $agente = $this->agenteRepository->update($request->all(), $id);

        Flash::success('Agente updated successfully.');

        return redirect(route('agentes.index'));
    }

    /**
     * Remove the specified Agente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);

        if (empty($agente)) {
            Flash::error('Agente not found');

            return redirect(route('agentes.index'));
        }

        $this->agenteRepository->delete($id);

        Flash::success('Agente deleted successfully.');

        return redirect(route('agentes.index'));
    }

    
    public function getFotoAgente($id)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);
        return view('agentes.uploadfoto')->with('Agente', $agente);
    }

    public function postFotoAgente(CreateFotoAgenteRequest $request, $id)
    {
        $agente = $this->agenteRepository->findWithoutFail($id);
        $novaFoto = $this->fotoRepository->uploadAndCreate($request);
        $publicId = $agente->nomeCloudinary ."_". $novaFoto->image_name;
        
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        if ($retorno) {
            Flash::success('Agente criado com sucesso!');
            return redirect("agentes/$id")->with('agente', $agente);
        }

        else {
            Flash::error('Erro no upload da foto!');
            return redirect("agentes/$id")->with('agente', $agente);
        }
    }
}
