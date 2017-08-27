<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\VideoDataTable;
use App\Repositories\VideoRepository;
use App\Http\Requests\CreateVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends AppBaseController
{
    /** @var VideoRepository */
    private $videoRepository;

    public function __construct(VideoRepository $videoRepo)
    {
        $this->videoRepository = $videoRepo;
    }

    /**
     * Display a listing of the Video.
     *
     * @param VideoDataTable $videoDataTable
     * @return Response
     */
    public function index(VideoDataTable $videoDataTable)
    {
        return $videoDataTable->render('videos.index');
    }

    /**
     * Show the form for creating a new Video.
     *
     * @return Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created Video in storage.
     *
     * @param CreateVideoRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoRequest $request)
    {
        $ytURL = 'https://youtu.be/'.$request->partial_url; 
        $request->request->add(['url' => $ytURL]);

        $input = $request->all();

        $video = $this->videoRepository->create($input);

        Flash::success('Video saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Video.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect()->back();
        }

        return view('videos.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified Video.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect()->back();
        }

        return view('videos.edit')->with('video', $video);
    }

    /**
     * Update the specified Video in storage.
     *
     * @param  int              $id
     * @param UpdateVideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoRequest $request)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect()->back();
        }

        $video = $this->videoRepository->update($request->all(), $id);

        Flash::success('Video updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified Video from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect()->back();
        }

        $this->videoRepository->delete($id);

        Flash::success('Video deleted successfully.');

        return redirect()->back();
    }
}
