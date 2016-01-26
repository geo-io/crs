<?php

namespace GeoIO\CRS\Exception;

class UnknownDefinitionException extends \RuntimeException
{
    public static function create($def)
    {
        $jsonFlags = 0;

        if (defined('JSON_UNESCAPED_SLASHES')) {
            $jsonFlags |= JSON_UNESCAPED_SLASHES;
        }

        if (defined('JSON_UNESCAPED_UNICODE')) {
            $jsonFlags |= JSON_UNESCAPED_UNICODE;
        }

        return new self(
            sprintf(
                'Unknown CRS definition %s',
                json_encode($def, $jsonFlags)
            )
        );
    }
}
