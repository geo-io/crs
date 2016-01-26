<?php

namespace GeoIO\CRS;

class FunctionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider crsToSridDataProvider
     *
     * @covers ::GeoIO\CRS\def_to_srid
     */
    public function it_converts_def_to_srid($def, $srid)
    {
        $this->assertSame(
            $srid,
            def_to_srid($def)
        );
    }

    /**
     * @test
     * @covers ::GeoIO\CRS\def_to_srid
     * @covers GeoIO\CRS\Exception\UnknownDefinitionException
     */
    public function it_throws_exception_for_unknown_crs()
    {
        $this->setExpectedException('GeoIO\CRS\Exception\UnknownDefinitionException');

        def_to_srid('foo');
    }

    /**
     * @test
     * @covers ::GeoIO\CRS\srid_to_urn
     */
    public function it_converts_srid_to_crn()
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

    public function crsToSridDataProvider()
    {
        $data = array(
            array(
                'urn:ogc:def:crs:OGC:1.3:CRS84',
                4326,
            ),
            array(
                'EPSG:4326',
                4326,
            ),
            array(
                'urn:ogc:def:crs:EPSG:4326',
                4326,
            ),
            array(
                'urn:ogc:def:crs:EPSG::4326',
                4326,
            ),
            array(
                'urn:ogc:def:crs:EPSG:6.6:4326',
                4326,
            ),
            array(
                'urn:x-ogc:def:crs:EPSG:6.6:4326',
                4326,
            ),
            array(
                'urn:EPSG:geographicCRS:4326',
                4326,
            ),
            array(
                'http://www.opengis.net/gml/srs/epsg.xml#4326',
                4326,
            ),
            array(
                'http://spatialreference.org/ref/epsg/4326',
                4326,
            ),
            array(
                'http://spatialreference.org/ref/epsg/4326/',
                4326,
            ),
        );

        return $data;
    }
}
