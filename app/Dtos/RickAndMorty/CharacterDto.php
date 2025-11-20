<?php

namespace App\Dtos\RickAndMorty;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;

class CharacterOriginDto extends Data
{
     public function __construct(
        public string $name,
        public string $url,
    ) {}
}


class CharacterLocationDto extends Data
{
    public function __construct(
        public string $name,
        public string $url,
    ) {}
}


class CharacterDto extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $status,
        public string $species,
        public string $type,
        public string $gender,
        public CharacterOriginDto $origin,
        public CharacterLocationDto $location,
        public string $image,
        /** @var string[] */
        public array $episode,
        public string $url,
        #[MapName('created')]
        public string $createdAt,
    ) {}
}
