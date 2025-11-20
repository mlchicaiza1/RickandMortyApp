<?php

namespace App\Http\Controllers\Apis;

use App\Contracts\IRickAndMortyService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RickAndMortyController extends Controller
{

    protected $rickAndMortyService;
    public function __construct(IRickAndMortyService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function characters(Request $request): JsonResponse
    {
        $filters = $request->only(['name', 'status', 'species', 'type', 'gender']);
        $page = $request->get('page', 1);
        $data = $this->rickAndMortyService->getAllCharacters($filters ,$page);
        return response()->json($data);
    }

    public function character(int $id): JsonResponse
    {
        $char = $this->rickAndMortyService->getCharacter($id);
        return response()->json($char);
    }

    public function episodes(int $page = 1): JsonResponse
    {
        $data = $this->rickAndMortyService->getAllEpisodes($page);
        return response()->json($data);
    }

    public function episode(int $id): JsonResponse
    {
        $ep = $this->rickAndMortyService->getEpisode($id);
        if (!$ep) {
            return response()->json(['message' => 'Episode not found'], 404);
        }
        return response()->json($ep);
    }

    public function locations(int $page = 1): JsonResponse
    {
        $data = $this->rickAndMortyService->getAllLocations($page);
        return response()->json($data);
    }

    public function location(int $id): JsonResponse
    {
        $loc = $this->rickAndMortyService->getLocation($id);
        if (!$loc) {
            return response()->json(['message' => 'Location not found'], 404);
        }
        return response()->json($loc);
    }
}
