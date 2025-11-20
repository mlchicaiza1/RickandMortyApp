<?php

namespace App\Dtos\RickAndMorty;

use Spatie\LaravelData\Data;

class InfoDto extends Data
{
     public function __construct(
        public int $count,
        public int $pages,
        public ?string $next,
        public ?string $prev,
    ) {}
}
