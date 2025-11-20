<?php

namespace App\Services;

use App\Contracts\IRickAndMortyService;
use App\Dtos\RickAndMorty\LocationDto;
use App\Dtos\RickAndMorty\EpisodeDto;
use App\Dtos\RickAndMorty\InfoDto;
use App\Dtos\RickAndMorty\CharacterDto;
use Illuminate\Support\Facades\Http;

class RickAndMortyService implements IRickAndMortyService
{
    protected string $baseUrl = 'https://rickandmortyapi.com/api';

    public function getAllCharacters(int $page = 1): array
    {
        $response = Http::get("{$this->baseUrl}/character", [
            'page' => $page,
        ]);

        $json = $response->json();

        $info = $json['info']  ?? null;
        $results = $json['results'] ?? [];

        // Mapear resultados a DTOs
        $characters = array_map(function ($char) {
            return CharacterDto::from($char);
        }, $results);

        return [
            'info' => InfoDto::from($info),
            'results' => $characters,
        ];
    }

    public function getCharacter(int $id): ?CharacterDto
    {
        $response = Http::get("{$this->baseUrl}/character/{$id}");

        if ($response->failed()) {
            return null;
        }

        $json = $response->json();

        return CharacterDto::from($json);
    }

    public function getAllLocations(int $page = 1): array
    {
        $response = Http::get("{$this->baseUrl}/location", [
            'page' => $page,
        ]);

        $json = $response->json();
        $results = $json['results'] ?? [];

        $locations = array_map(fn($loc) => LocationDto::from($loc), $results);

        return [
            'info' => InfoDto::from($json['info'] )?? null,
            'results' => $locations,
        ];
    }

    public function getLocation(int $id): ?LocationDto
    {
        $response = Http::get("{$this->baseUrl}/location/{$id}");

        if ($response->failed()) {
            return null;
        }

        return LocationDto::from($response->json());
    }

    public function getAllEpisodes(int $page = 1): array
    {
        $response = Http::get("{$this->baseUrl}/episode", [
            'page' => $page,
        ]);

        $json = $response->json();
        $results = $json['results'] ?? [];

        $episodes = array_map(fn($ep) => EpisodeDto::from($ep), $results);

        return [
            'info' => InfoDto::from($json['info']) ?? null,
            'results' => $episodes,
        ];
    }

    public function getEpisode(int $id): ?EpisodeDto
    {
        $response = Http::get("{$this->baseUrl}/episode/{$id}");

        if ($response->failed()) {
            return null;
        }

        return EpisodeDto::from($response->json());
    }
}
