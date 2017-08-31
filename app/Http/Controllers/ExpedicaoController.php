<?php

namespace App\Http\Controllers;

use App\DataTables\ExpedicaoDataTable;
use App\Http\Requests\CreateExpedicaoRequest;
use App\Http\Requests\CreateFotoInternaExpRequest;
use App\Http\Requests\CreateFotoListagemExpRequest;
use App\Http\Requests\UpdateExpedicaoRequest;
use App\Repositories\ExpedicaoRepository;
use App\Repositories\FotoRepository;
use Flash;
use Response;

class ExpedicaoController extends AppBaseController
{
    /** @var ExpedicaoRepository */
    private $expedicaoRepository;

    /** @var  FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo, ExpedicaoRepository $expedicaoRepo)
    {
        $this->expedicaoRepository = $expedicaoRepo;
        $this->fotoRepository = $fotoRepo;
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

        return redirect('expedicaos/'.$expedicao->id.'/foto-listagem');
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


    /**
     * Metodo para retornar a view para settar a foto da listagem da Expedicao
     * 
     * @param mixed $id
     */
    public function getFotoListagem($id)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);
        return view('expedicaos.create_foto_listagem')->with('expedicao', $expedicao);
    }


    /**
     * Metodo que recebe o POST da foto da listagem de uma experiencia
     *
     * @param CreateFotoListagemExpRequest $request
     * @param mixed $id
     */
    public function postFotoListagem(CreateFotoListagemExpRequest $request, $id)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);

        if ( $expedicao->mediaListagem ) {
            $this->fotoRepository->delete($expedicao->mediaListagem->id);
        }

        $novaFoto = $this->fotoRepository->uploadAndCreate($request);
        $expedicao->mediaListagem()->associate($novaFoto)->push();

        //Monta o public ID a partir do nome do expedicao e da timestamp da foto
        $publicId = $expedicao->tituloCloudinary ."_". $novaFoto->image_name;
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        //Se tiver enviado pro Cloudinary com sucesso
        if ($retorno) {
            return [
                'success' => true,
                'redirectURL' => "/expedicaos/$id/create-descricoes",
                'message' => 'Foto da listagem atualizada! Recarregando...'
            ];
        }

        else {
            Flash::error('Erro no upload da foto!');
            return redirect("agentes/$id")->with('agente', $agente);
        }
    }


    /**
     * Metodo que recebe o POST de criacao das Fotos do slider interno das expedicoes
     * 
     * @param CreateFotoInternaExpRequest $request
     * @param mixed $id
     */
    public function postCreateMediasInterna(CreateFotoInternaExpRequest $request, $id)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);
        $novaFoto = $this->fotoRepository->uploadAndCreate($request);

        //Monta o public ID a partir do nome do expedicao e da timestamp da foto
        $publicId = $expedicao->tituloCloudinary ."_". $novaFoto->image_name;
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        //Se tiver enviado pro Cloudinary com sucesso
        if ($retorno) {
            return [
                'success' => true,
                'redirectURL' => "/expedicaos/$id/create-medias-interna",
                'message' => 'Foto inserida! Recarregando...'
            ];
        }

        else {
            Flash::error('Erro no upload da foto!');
            return redirect("expedicaos/$id")->with('expedicao', $expedicao);
        }
    }

    /**
     * Metodo para retornar a view para criar as descricoes de uma expedicao
     * 
     * @param mixed $id
     */
    public function getCreateDescricoes($id)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);
        return view('expedicaos.create_descricoes')->with('expedicao', $expedicao);
    }

    /**
     * Metodo para retornar a view para criar as fotos / videos da interna de uma expedicao
     * 
     * @param mixed $id
     */
    public function getCreateMediasInterna($id)
    {
        $expedicao = $this->expedicaoRepository->findWithoutFail($id);
        return view('expedicaos.create_medias')->with('expedicao', $expedicao);
    }
}
