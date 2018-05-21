<?php

namespace App\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use App\Repositories\FotoRepository;

class HomeController extends Controller
{

    /** @var FotoRepository */
    private $fotoRepository;

    public function __construct(FotoRepository $fotoRepo)
    {
        $this->fotoRepository = $fotoRepo;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Metodo para servrir a view de alterar a foto de Volunturismo da Home
     */
    public function getFotoVolunturismo()
    {
        $FotosHome = \App\Models\FotosHome::first();
        return view('home.foto_volunturismo')
            ->with("FotosHome", $FotosHome);
    }
    

    /**
     * Metodo para fazer o upload de uma nova foto de Volunturismo
     * @param Request $request
     */
    public function postFotoVolunturismo(Request $request)
    {
        $fotosHome = \App\Models\FotosHome::first();

        if ($fotosHome->fotoVolunturismo) {
            $this->fotoRepository->delete($fotosHome->fotoVolunturismo->id);
        }

        $novaFoto = $this->fotoRepository->uploadAndCreate($request);
        $fotosHome->foto_volunturismo_id = $novaFoto->id;
        $fotosHome->save();

        $publicId = "home_volunturismo_".time();

        //Monta o public ID a partir do nome do expedicao e da timestamp da foto
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        //Se tiver enviado pro Cloudinary com sucesso
        if ($retorno) {
            Flash::success('Foto de Volunturismo alterada com sucesso!');

            return [
                'success' => true,
                'redirectURL' => '/volunturismo/foto-home',
                'message' => 'Foto atualizada! Recarregando...',
            ];
        } else {
            Flash::error('Erro no upload da foto!');
            return redirect()->back();
        }
    }

    /**
     * Metodo para servrir a view de alterar a foto de Ecoturismo da Home
     */
    public function getFotoEcoturismo()
    {
        $FotosHome = \App\Models\FotosHome::first();
        return view('home.foto_ecoturismo')
            ->with("FotosHome", $FotosHome);
    }
    

    /**
     * Metodo para fazer o upload de uma nova foto de Ecoturismo
     * @param Request $request
     */
    public function postFotoEcoturismo(Request $request)
    {
        $fotosHome = \App\Models\FotosHome::first();

        if ($fotosHome->fotoEcoturismo) {
            $this->fotoRepository->delete($fotosHome->fotoEcoturismo->id);
        }

        $novaFoto = $this->fotoRepository->uploadAndCreate($request);
        $fotosHome->foto_ecoturismo_id = $novaFoto->id;
        $fotosHome->save();

        $publicId = "home_ecoturismo_".time();

        //Monta o public ID a partir do nome do expedicao e da timestamp da foto
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        //Se tiver enviado pro Cloudinary com sucesso
        if ($retorno) {
            Flash::success('Foto de Ecoturismo alterada com sucesso!');

            return [
                'success' => true,
                'redirectURL' => '/ecoturismo/foto-home',
                'message' => 'Foto atualizada! Recarregando...',
            ];
        } else {
            Flash::error('Erro no upload da foto!');
            return redirect()->back();
        }
    }


    /**
     * Metodo para servrir a view de alterar a foto de Imersoes da Home
     */
    public function getFotoImersoes()
    {
        $FotosHome = \App\Models\FotosHome::first();
        return view('home.foto_imersoes')
            ->with("FotosHome", $FotosHome);
    }
    

    /**
     * Metodo para fazer o upload de uma nova foto de Imersoes
     * @param Request $request
     */
    public function postFotoImersoes(Request $request)
    {
        $fotosHome = \App\Models\FotosHome::first();

        if ($fotosHome->fotoImersoes) {
            $this->fotoRepository->delete($fotosHome->fotoImersoes->id);
        }

        $novaFoto = $this->fotoRepository->uploadAndCreate($request);
        $fotosHome->foto_imersoes_id = $novaFoto->id;
        $fotosHome->save();

        $publicId = "home_imersoes_".time();

        //Monta o public ID a partir do nome do expedicao e da timestamp da foto
        $retorno = $this->fotoRepository->sendToCloudinary($novaFoto, $publicId);

        //Se tiver enviado pro Cloudinary com sucesso
        if ($retorno) {
            Flash::success('Foto de Imersoes alterada com sucesso!');

            return [
                'success' => true,
                'redirectURL' => '/imersoes/foto-home',
                'message' => 'Foto atualizada! Recarregando...',
            ];
        } else {
            Flash::error('Erro no upload da foto!');
            return redirect()->back();
        }
    }

}
