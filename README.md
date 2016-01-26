Geo I/O CRS
===========

[![Build Status](https://travis-ci.org/geo-io/crs.svg?branch=master)](https://travis-ci.org/geo-io/crs)
[![Coverage Status](https://img.shields.io/coveralls/geo-io/crs.svg?style=flat)](https://coveralls.io/r/geo-io/crs)

[Coordinate Reference System](https://en.wikipedia.org/wiki/Spatial_reference_system) (CRS) utilities.

Installation
------------

Install [through composer](http://getcomposer.org). Check the
[packagist page](https://packagist.org/packages/geo-io/crs) for all
available versions.

```bash
composer require geo-io/crs
```

Usage
-----

### `def_to_srid`

Converts a CRS definition to a 
[Spatial Reference System Identifier](https://en.wikipedia.org/wiki/SRID) (SRID).

```php
echo GeoIO\CRS\def_to_srid('urn:ogc:def:crs:OGC:1.3:CRS84')."\n;
echo GeoIO\CRS\def_to_srid('http://spatialreference.org/ref/epsg/4322')."\n;
```

The above example will producte the following output.

```
4326
4322
```

If the definition can't be converted to a SRID, it throws a 
`GeoIO\CRS\Exception\UnknownDefinitionException`.

### `def_to_srid`

Converts a [Spatial Reference System Identifier](https://en.wikipedia.org/wiki/SRID) 
(SRID) to an URN.

```php
echo GeoIO\CRS\srid_to_urn(4326);
echo GeoIO\CRS\srid_to_urn(4322);
```

The above example will produce the following output.

```
urn:ogc:def:crs:OGC:1.3:CRS84
urn:ogc:def:crs:EPSG::4322
```

License
-------

Geo I/O CRS is released under the [MIT License](LICENSE).