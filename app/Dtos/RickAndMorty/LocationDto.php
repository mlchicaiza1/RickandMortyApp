<?php

namespace App\Dtos\RickAndMorty;

use Spatie\LaravelData\Data;

class LocationDto extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $type,
        public string $dimension,
        /** @var string[] */
        public array $residents,
        public string $url,
        public string $created,
    ) {}
}
