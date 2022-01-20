<?php

declare(strict_types=1);

namespace GeoIO\CRS\Exception;

use RuntimeException;

class UnknownDefinitionException extends RuntimeException
{
    public static function create(string $def): self
    {
        return new self(
            sprintf(
                'Unknown CRS definition %s',
                json_encode($def, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            ),
        );
    }
}
