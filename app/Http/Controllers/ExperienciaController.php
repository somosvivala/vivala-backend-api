<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Repositories\FotoRepository;
use App\DataTables\ExperienciaDataTable;
use App\Repositories\ExperienciaRepository;
use App\Http\Requests\CreateExperienciaRequest;
use App\Http\Requests\UpdateExperienciaRequest;
use App\Http\Requests\CreateFotoInternaExpRequest;
use App\Http\Requests\CreateFotoListagemExpRequest;

class ExperienciaController extends AppBaseController
{
    /** @var ExperienciaRepository */
    private $experienciaRepository;

    /** @var FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo, ExperienciaRepository $experienciaRepo)
    {
        $this->experienciaRepository = $experienciaRepo;
        $this->fotoRepository = $fotoRepo;
    }

    /**
     * Display a listing of the Experiencia.
     *
     * @param ExperienciaDataTable $experienciaDataTable
     * @return Response
     */
    public function index(ExperienciaDataTable $experienciaDataTable)
    {
        return $experienciaDataTable->render('experiencias.index');
    }

    /**
     * Show the form for creating a new Experiencia.
     *
     * @return Response
     */
    public function create()
    {
        return view('experiencias.create');
    }

    /**
     * Store a newly created Experiencia in storage.
     *
     * @param CreateExperienciaRequest $request
     *
     * @return Response
     */
    public function store(CreateExperienciaRequest $request)
    {
        $input = $request->all();

        $experiencia = $this->experienciaRepository->create($input);

        Flash::success('Experiencia criada com sucesso.');

        return redirect('experiencias/'.$experiencia->id.'/foto-listagem');
    }

    /**
     * Display the specified Experiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia não encontrada');

            return redirect(route('experiencias.index'));
        }

        return view('experiencias.show')->with('experiencia', $experiencia);
    }

    /**
     * Show the form for editing the specified Experiencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia não encontrada');

            return redirect(route('experiencias.index'));
        }

        return view('experiencias.edit')->with('experiencia', $experiencia);
    }

    /**
     * Update the specified Experiencia in storage.
     *
     * @param  int              $id
     * @param UpdateExperienciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExperienciaRequest $request)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia não encontrada');

            return redirect(route('experiencias.index'));
        }

        $experiencia = $this->experienciaRepository->update($request->all(), $id);

        Flash::success('Experiencia atualizada com sucesso.');

        return redirect(route('experiencias.index'));
    }

    /**
     * Remove the specified Experiencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia não encontrada');

            return redirect(route('experiencias.index'));
        }

        $this->experienciaRepository->delete($id);

        Flash::success('Experiencia removida com sucesso');

        return redirect(route('experiencias.index'));
    }

    /**
     * Metodo para retornar a view para settar a foto da listagem da Experiencia.
     *
     * @param mixed $id
     */
    public function getFotoListagem($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        return view('experiencias.create_foto_listagem')->with('experiencia', $experiencia);
    }

    /**
     * Metodo que recebe o POST da foto da listagem de uma experiencia.
     *
     * @param CreateFotoListagemExpRequest $request
     * @param mixed $id
     */
    public function postFotoListagem(CreateFotoListagemExpRequest $request, $id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if ($experiencia->mediaListagem) {
            $this->fotoRepository->delete($experiencia->mediaListagem->id);
        }

        $novaFoto = $this->fotoRepository->uploadAndCreate($request);
        $experiencia->mediaListagem()->associate($novaFoto)->push();

        //Monta o public ID a partir do nome do experiencia e um timestamp
        $publicId = $experiencia->tituloCloudinary.'_'.time();
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        //Se tiver enviado pro Cloudinary com sucesso
        if ($retorno) {
            Flash::success('Foto atualizada com sucesso!');

            return [
                'success' => true,
                'redirectURL' => '/experiencias/',
                'message' => 'Foto da listagem atualizada! Recarregando...',
            ];
        } else {
            Flash::error('Erro no upload da foto!');

            return redirect()->back();
        }
    }

    /**
     * Metodo que recebe o POST de ativar a exibição dessa experiencia em /ecoturismo.
     *
     * @param mixed $id
     */
    public function postAtivaListagem($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia não encontrada');

            return redirect(route('experiencias.index'));
        }

        $retorno = $this->experienciaRepository->ativaExperiencia($experiencia);
        Flash::success('Experiencia ativada com sucesso.');

        return redirect()->back();
    }

    /**
     * Metodo que recebe o POST de desativar a exibição dessa experiencia em /volunturismo.
     *
     * @param mixed $id
     */
    public function postRemoveListagem($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        if (empty($experiencia)) {
            Flash::error('Experiencia não encontrada');

            return redirect(route('experiencias.index'));
        }

        $retorno = $this->experienciaRepository->desativaExperiencia($experiencia);
        Flash::success('Experiencia desativada com sucesso.');

        return redirect()->back();
    }

    /**
     * Metodo que recebe o POST de criacao das Fotos do slider interno das experiencia.
     *
     * @param CreateFotoInternaExpRequest $request
     * @param mixed $id
     */
    public function postCreateMediasInterna(CreateFotoInternaExpRequest $request, $id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);
        $novaFoto = $this->fotoRepository->uploadAndCreate($request);

        //Monta o public ID a partir do nome do experiencia e da timestamp da foto
        $publicId = $experiencia->tituloCloudinary.'_'.$novaFoto->image_name;
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        //Se tiver enviado pro Cloudinary com sucesso
        if ($retorno) {
            return [
                'success' => true,
                'redirectURL' => "/experiencias/$id/create-medias-interna",
                'message' => 'Foto inserida! Recarregando...',
            ];
        } else {
            Flash::error('Erro no upload da foto!');

            return redirect("experiencias/$id")->with('experiencia', $experiencia);
        }
    }

    /**
     * Metodo para retornar a view para criar as descricoes de uma experiencia.
     *
     * @param mixed $id
     */
    public function getCreateDescricoes($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        return view('experiencias.create_descricoes')->with('experiencia', $experiencia);
    }

    /**
     * Metodo para retornar a view para criar as fotos / videos da interna de uma experiencia.
     *
     * @param mixed $id
     */
    public function getCreateMediasInterna($id)
    {
        $experiencia = $this->experienciaRepository->findWithoutFail($id);

        return view('experiencias.create_medias')->with('experiencia', $experiencia);
    }
}
