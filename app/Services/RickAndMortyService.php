<?php

namespace App\Services;

use App\Contracts\IRickAndMortyService;
use App\Dtos\RickAndMorty\LocationDto;
use App\Dtos\RickAndMorty\EpisodeDto;
use App\Dtos\RickAndMorty\InfoDto;
use App\Dtos\RickAndMorty\CharacterDto;
use App\Exceptions\RickAndMortyApiException;
use Illuminate\Support\Facades\Http;

class RickAndMortyService implements IRickAndMortyService
{
    protected string $baseUrl = 'https://rickandmortyapi.com/api';

    protected function request(string $endpoint, array $query = [])
    {
        $response =  Http::timeout(10)->get("{$this->baseUrl}{$endpoint}",$query);

        if ($response->failed()) {
            throw RickAndMortyApiException::notFound(
                'No existe el recurso con ID: ' . "{$this->baseUrl}{$endpoint}"
            );
        }

        $json = $response->json();

        if (!is_array($json)) {
            throw new RickAndMortyApiException(
                "Respuesta inesperada de la API en {$endpoint}",
                500
            );
        }

        return $json;
    }

    public function getAllCharacters(array $filters = [],int $page = 1): array
    {
        $query = array_merge($filters, ['page' => $page]);
        $json  = $this->request("/character", $query);

        $info = $json['info'] ?? null;
        $results = $json['results'] ?? [];

        return [
            'info' => InfoDto::from($info),
            'results' => array_map(fn ($c) => CharacterDto::from($c), $results),
        ];
    }

    public function getCharacter(int $id): ?CharacterDto
    {
        $json = $this->request("/character/{$id}");
        return CharacterDto::from($json);
    }

    public function getAllLocations(array $filters = [],int $page = 1): array
    {
        $query = array_merge($filters, ['page' => $page]);
        $json = $this->request("/location", $query);

        return [
            'info' => InfoDto::from($json['info'] ?? null),
            'results' => array_map(fn ($l) => LocationDto::from($l), $json['results'] ?? []),
        ];
    }

    public function getLocation(int $id): ?LocationDto
    {
        $json = $this->request("/location/{$id}");
        return LocationDto::from($json);
    }

    public function getAllEpisodes(array $filters = [],int $page = 1): array
    {
        $query = array_merge($filters, ['page' => $page]);
        $json = $this->request("/episode", $query);

        return [
            'info' => InfoDto::from($json['info'] ?? null),
            'results' => array_map(fn ($e) => EpisodeDto::from($e), $json['results'] ?? []),
        ];
    }

    public function getEpisode(int $id): ?EpisodeDto
    {
        $json = $this->request("/episode/{$id}");
        return EpisodeDto::from($json);
    }
}
