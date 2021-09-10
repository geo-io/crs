Geo I/O CRS
===========

[![Build Status](https://github.com/geo-io/crs/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/geo-io/crs/actions/workflows/ci.yml)
[![Coverage Status](https://coveralls.io/repos/geo-io/crs/badge.svg?branch=main&service=github)](https://coveralls.io/github/geo-io/crs?branch=main)

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
echo GeoIO\CRS\def_to_srid('urn:ogc:def:crs:OGC:1.3:CRS84')."\n";
echo GeoIO\CRS\def_to_srid('http://spatialreference.org/ref/epsg/4322')."\n";
```

The above example will produce the following output.

```
4326
4322
```

If the definition can't be converted to a SRID, it throws a 
`GeoIO\CRS\Exception\UnknownDefinitionException`.

### `srid_to_urn`

Converts a [Spatial Reference System Identifier](https://en.wikipedia.org/wiki/SRID) 
(SRID) to an URN.

```php
echo GeoIO\CRS\srid_to_urn(4326)."\n";
echo GeoIO\CRS\srid_to_urn(4322)."\n";
```

The above example will produce the following output.

```
urn:ogc:def:crs:OGC:1.3:CRS84
urn:ogc:def:crs:EPSG::4322
```

License
-------

Geo I/O CRS is released under the [MIT License](LICENSE).
