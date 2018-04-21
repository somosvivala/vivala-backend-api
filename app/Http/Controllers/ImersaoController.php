<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\ImersaoDataTable;
use App\Repositories\FotoRepository;
use App\Repositories\ImersaoRepository;
use App\Http\Requests\CreateImersaoRequest;
use App\Http\Requests\UpdateImersaoRequest;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateFotoListagemExpRequest;

class ImersaoController extends AppBaseController
{
    /** @var  ImersaoRepository */
    private $imersaoRepository;

    /** @var FotoRepository */
    private $fotoRepository;

    /**
     * Construtor recebendo infos necessarias
     *
     * @param FotoRepository $fotoRepo
     * @param ImersaoRepository $imersaoRepo
     */
    public function __construct(FotoRepository $fotoRepo, ImersaoRepository $imersaoRepo)
    {
        $this->imersaoRepository = $imersaoRepo;
        $this->fotoRepository = $fotoRepo;
    }

    /**
     * Display a listing of the Imersao.
     *
     * @param ImersaoDataTable $imersaoDataTable
     * @return Response
     */
    public function index(ImersaoDataTable $imersaoDataTable)
    {
        return $imersaoDataTable->render('imersaos.index');
    }

    /**
     * Show the form for creating a new Imersao.
     *
     * @return Response
     */
    public function create()
    {
        return view('imersaos.create');
    }

    /**
     * Store a newly created Imersao in storage.
     *
     * @param CreateImersaoRequest $request
     *
     * @return Response
     */
    public function store(CreateImersaoRequest $request)
    {
        $input = $request->all();

        $imersao = $this->imersaoRepository->create($input);

        Flash::success('Imersao criada com sucesso.');

        return redirect('imersaos/'.$imersao->id.'/foto-listagem');
    }

    /**
     * Display the specified Imersao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao não encontrada');

            return redirect(route('imersaos.index'));
        }

        return view('imersaos.show')->with('imersao', $imersao);
    }

    /**
     * Show the form for editing the specified Imersao.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao não encontrada');

            return redirect(route('imersaos.index'));
        }

        return view('imersaos.edit')->with('imersao', $imersao);
    }

    /**
     * Update the specified Imersao in storage.
     *
     * @param  int              $id
     * @param UpdateImersaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImersaoRequest $request)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao não encontrada');

            return redirect(route('imersaos.index'));
        }

        $imersao = $this->imersaoRepository->update($request->all(), $id);

        Flash::success('Imersao updated successfully.');

        return redirect(route('imersaos.index'));
    }

    /**
     * Remove the specified Imersao from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao não encontrada');

            return redirect(route('imersaos.index'));
        }

        $this->imersaoRepository->delete($id);

        Flash::success('Imersao deleted successfully.');

        return redirect(route('imersaos.index'));
    }




    /**
     * Metodo para retornar a view para settar a foto da listagem da Imersao.
     *
     * @param mixed $id
     */
    public function getFotoListagem($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        return view('imersaos.create_foto_listagem')->with('imersao', $imersao);
    }

    /**
     * Metodo que recebe o POST da foto da listagem de uma imersao.
     *
     * @param CreateFotoListagemExpRequest $request
     * @param mixed $id
     */
    public function postFotoListagem(CreateFotoListagemExpRequest $request, $id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if ($imersao->mediaListagem) {
            $this->fotoRepository->delete($imersao->mediaListagem->id);
        }

        $novaFoto = $this->fotoRepository->uploadAndCreate($request);
        $imersao->mediaListagem()->associate($novaFoto)->push();

        //Monta o public ID a partir do nome do imersao e da timestamp da foto
        $publicId = $imersao->tituloCloudinary.'_'.$novaFoto->image_name;
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        //Se tiver enviado pro Cloudinary com sucesso
        if ($retorno) {
            Flash::success('Imersao criada com sucesso!');

            return [
                'success' => true,
                'redirectURL' => '/imersaos',
                'message' => 'Foto da listagem atualizada! Recarregando...',
            ];
        } else {
            Flash::error('Erro no upload da foto!');

            return redirect("agentes/$id")->with('agente', $agente);
        }
    }

    /**
     * Metodo que recebe o POST de ativar a exibição dessa imersao em /imersoes.
     *
     * @param mixed $id
     */
    public function postAtivaListagem($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao não encontrada');

            return redirect(route('imersaos.index'));
        }

        $retorno = $this->imersaoRepository->ativaImersao($imersao);
        Flash::success('Imersao ativada com sucesso.');

        return redirect()->back();
    }

    /**
     * Metodo que recebe o POST de desativar a exibição dessa imersao em /imersoes.
     *
     * @param mixed $id
     */
    public function postRemoveListagem($id)
    {
        $imersao = $this->imersaoRepository->findWithoutFail($id);

        if (empty($imersao)) {
            Flash::error('Imersao não encontrada');

            return redirect(route('imersaos.index'));
        }

        $retorno = $this->imersaoRepository->desativaImersao($imersao);
        Flash::success('Imersao desativada com sucesso.');

        return redirect()->back();
    }

}
