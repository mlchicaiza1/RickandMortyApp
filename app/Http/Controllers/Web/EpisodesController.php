<?php

namespace App\Http\Controllers\Web;

use App\Contracts\IRickAndMortyService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    protected $rickAndMortyService;

    public function __construct(IRickAndMortyService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'episode']);
        $page = $request->get('page', 1);

        $data = $this->rickAndMortyService->getAllEpisodes($filters,$page);

        return Inertia::render('Episodes/Index', [
            'episodes' => $data['results'],
            'page' => (int) $page,
            'filters' => $filters,
            'hasNext' => $data['info']->next !== null,
            'hasPrev' => $data['info']->prev !== null,
        ]);
    }

    public function show($id)
    {
        $episode = $this->rickAndMortyService->getEpisode($id);

        return Inertia::render('Episodes/Show', [
            'episode' => $episode,
        ]);
    }
}
