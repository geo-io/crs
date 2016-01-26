<?php

namespace GeoIO\CRS\Exception;

class UnknownDefinitionException extends \RuntimeException
{
    public static function create($def)
    {
        return new self(sprintf(
            'Unknown CRS definition %s',
            json_encode($def, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        ));
    }
}
