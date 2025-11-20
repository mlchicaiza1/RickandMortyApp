<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class RickAndMortyApiException extends Exception
{
    const NOT_FOUND = 4;
    public function __construct(
        string $message = "Error al consumir la API de Rick and Morty",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code,$previous);
    }

    public static function notFound(string $message = ""): self
    {
        return new self(
            $message ?: 'Recurso no encontrado',
            self::NOT_FOUND,
        );
    }
}
