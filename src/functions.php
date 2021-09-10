<?php

declare(strict_types=1);

namespace GeoIO\CRS;

use GeoIO\CRS\Exception\UnknownDefinitionException;

function def_to_srid(string $def): int
{
    static $urnMap = [
        'urn:ogc:def:crs:OGC:1.3:CRS84' => 4326,
    ];

    if (isset($urnMap[$def])) {
        return $urnMap[$def];
    }

    // EPSG:4326
    // urn:ogc:def:crs:EPSG:4326
    // urn:ogc:def:crs:EPSG::4326
    // urn:ogc:def:crs:EPSG:6.6:4326
    // urn:x-ogc:def:crs:EPSG:6.6:4326
    // urn:EPSG:geographicCRS:4326
    if (0 === stripos($def, 'EPSG:') ||
        0 === stripos($def, 'urn:ogc:def:crs:EPSG:') ||
        0 === stripos($def, 'urn:x-ogc:def:crs:EPSG:') ||
        0 === stripos($def, 'urn:EPSG:geographicCRS:')) {
        $parts = explode(':', $def);

        return (int) array_pop($parts);
    }

    // http://www.opengis.net/gml/srs/epsg.xml#4326
    if (0 === stripos($def, 'http://www.opengis.net/gml/srs/epsg.xml#')) {
        $parts = explode('#', $def);

        return (int) array_pop($parts);
    }

    // http://spatialreference.org/ref/epsg/4326/
    if (0 === stripos($def, 'http://spatialreference.org/ref/epsg/')) {
        $parts = explode('/', trim($def, '/'));

        return (int) array_pop($parts);
    }

    throw UnknownDefinitionException::create($def);
}

function srid_to_urn(int $srid): string
{
    if (4326 === $srid) {
        return 'urn:ogc:def:crs:OGC:1.3:CRS84';
    }

    return 'urn:ogc:def:crs:EPSG::' . $srid;
}
