<?php

namespace App\Http\Controllers\Web;

use App\Contracts\IRickAndMortyService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    protected $rickAndMortyService;

    public function __construct(IRickAndMortyService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'status', 'species', 'type', 'gender']);
        $page = $request->get('page', 1);

        $data = $this->rickAndMortyService->getAllCharacters($filters, $page);

        return Inertia::render('Characters/Index', [
            'characters' => $data['results'],
            'page' => (int) $page,
            'filters' => $filters,
            'hasNext' => $data['info']->next !== null,
            'hasPrev' => $data['info']->prev !== null,
        ]);
    }

    public function show($id)
    {
        $character = $this->rickAndMortyService->getCharacter($id);

        return Inertia::render('Characters/Show', [
            'character' => $character,
        ]);
    }
}
