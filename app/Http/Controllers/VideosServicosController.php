<?php

namespace App\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use App\Repositories\VideoRepository;

class VideosServicosController extends Controller
{

    /** @var VideoRepository */
    private $videoRepository;

    public function __construct(VideoRepository $videoRepo)
    {
        $this->videoRepository = $videoRepo;
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
     * Metodo para servrir a view de alterar a video de Volunturismo
     */
    public function getVideoVolunturismo()
    {
        $VideosServico = \App\Models\VideosServico::first();
        return view('videos.video_volunturismo')
            ->with("VideosServico", $VideosServico);
    }

    /**
     * Metodo para fazer o upload de um video de Volunturismo
     * @param Request $request
     */
    public function postVideoVolunturismo(Request $request)
    {
        $videosServico = \App\Models\VideosServico::first();

        if ($videosServico->videoVolunturismo) {
            $videosServico->videoVolunturismo->delete();
        }

        $novoVideo = $this->videoRepository->create($request->all());

        //Se tiver salvo com sucesso
        if ($novoVideo) {
            $videosServico->video_volunturismo_id = $novoVideo->id;
            $videosServico->save();
            Flash::success('Video de Volunturismo alterado com sucesso!');

            return [
                'success' => true,
                'redirectURL' => '/volunturismo/video',
                'message' => 'Video atualizado! Recarregando...',
            ];
        } else {
            Flash::error('Erro no upload da video!');
            return redirect()->back();
        }
    }


    /**
     * Metodo para servrir a view de alterar a video de Ecoturismo
     */
    public function getVideoEcoturismo()
    {
        $VideosServico = \App\Models\VideosServico::first();
        return view('videos.video_ecoturismo')
            ->with("VideosServico", $VideosServico);
    }

    /**
     * Metodo para fazer o upload de um video de Ecoturismo
     * @param Request $request
     */
    public function postVideoEcoturismo(Request $request)
    {
        $videosServico = \App\Models\VideosServico::first();

        if ($videosServico->videoEcoturismo) {
            $videosServico->videoEcoturismo->delete();
        }

        $novoVideo = $this->videoRepository->create($request->all());

        //Se tiver salvo com sucesso
        if ($novoVideo) {
            $videosServico->video_ecoturismo_id = $novoVideo->id;
            $videosServico->save();
            Flash::success('Video de Ecoturismo alterado com sucesso!');

            return [
                'success' => true,
                'redirectURL' => '/ecoturismo/video',
                'message' => 'Video atualizado! Recarregando...',
            ];
        } else {
            Flash::error('Erro no upload da video!');
            return redirect()->back();
        }
    }
    

}
