<?php

namespace App\Contracts;

use App\Dtos\RickAndMorty\CharacterDto;
use App\Dtos\RickAndMorty\EpisodeDto;
use App\Dtos\RickAndMorty\LocationDto;

/**
 * Interfaz del servicio que consume la API de Rick and Morty.
 */
interface IRickAndMortyService
{
    public function getAllCharacters(array $filters = [],int $page = 1): array;
    public function getCharacter(int $id): ?CharacterDto;

    public function getAllLocations(int $page = 1): array;

    public function getLocation(int $id): ?LocationDto;

    public function getAllEpisodes(int $page = 1): array;

    public function getEpisode(int $id): ?EpisodeDto;
}
