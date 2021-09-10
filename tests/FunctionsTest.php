<?php

namespace GeoIO\CRS;

use PHPUnit\Framework\TestCase;
use GeoIO\CRS\Exception\UnknownDefinitionException;

class FunctionsTest extends TestCase
{
    /**
     * @test
     * @dataProvider crsToSridDataProvider
     */
    public function it_converts_def_to_srid($def, $srid): void
    {
        $this->assertSame(
            $srid,
            def_to_srid($def)
        );
    }

    /**
     * @test
     */
    public function it_throws_exception_for_unknown_crs(): void
    {
        $this->expectException(UnknownDefinitionException::class);

        def_to_srid('foo');
    }

    /**
     * @test
     */
    public function it_converts_srid_to_crn(): void
    {
        $this->assertSame(
            'urn:ogc:def:crs:OGC:1.3:CRS84',
            srid_to_urn(4326)
        );

        $this->assertSame(
            'urn:ogc:def:crs:EPSG::3857',
            srid_to_urn(3857)
        );
    }

    public function crsToSridDataProvider(): iterable
    {
        yield [
            'urn:ogc:def:crs:OGC:1.3:CRS84',
            4326,
        ];

        yield [
            'EPSG:4326',
            4326,
        ];

        yield [
            'urn:ogc:def:crs:EPSG:4326',
            4326,
        ];

        yield [
            'urn:ogc:def:crs:EPSG::4326',
            4326,
        ];

        yield [
            'urn:ogc:def:crs:EPSG:6.6:4326',
            4326,
        ];

        yield [
            'urn:x-ogc:def:crs:EPSG:6.6:4326',
            4326,
        ];

        yield [
            'urn:EPSG:geographicCRS:4326',
            4326,
        ];

        yield [
            'http://www.opengis.net/gml/srs/epsg.xml#4326',
            4326,
        ];

        yield [
            'http://spatialreference.org/ref/epsg/4326',
            4326,
        ];

        yield [
            'http://spatialreference.org/ref/epsg/4326/',
            4326,
        ];
    }
}
