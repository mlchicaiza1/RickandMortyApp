<?php

namespace App\Dtos\RickAndMorty;

use Spatie\LaravelData\Data;

class EpisodeDto extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $air_date,
        public string $episode,
        /** @var string[] */
        public array $characters,
        public string $url,
        public string $created,
    ) {}
}
