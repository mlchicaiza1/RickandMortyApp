<?php

namespace App\Http\Controllers\Web;

use App\Contracts\IRickAndMortyService;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    protected $rickAndMortyService;

    public function __construct(IRickAndMortyService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['name', 'type', 'dimension']);
        $page = $request->get('page', 1);

        $data = $this->rickAndMortyService->getAllLocations($filters,$page);

        return Inertia::render('Locations/Index', [
            'locations' => $data['results'],
            'page' => (int) $page,
            'filters' => $filters,
            'hasNext' => $data['info']->next !== null,
            'hasPrev' => $data['info']->prev !== null,
        ]);
    }

    public function show($id)
    {
        $location = $this->rickAndMortyService->getLocation($id);

        return Inertia::render('Locations/Show', [
            'location' => $location,
        ]);
    }
}
