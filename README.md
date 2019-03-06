# PHP Normalize Coordinate

[![travis-ci](https://travis-ci.org/zackad/normalize-coordinate.svg?branch=master)](https://travis-ci.org/zackad/normalize-coordinate)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/zackad/normalize-coordinate/blob/master/LICENSE)

Library to normalize Geographic Coordinate System (GCS) so the coordinate will be in the range of

```
-180 < longitude < 180
-90  < latitude  < 90
```

## Installation

Install with composer

```shell
composer require zackad/normalize-coordinate
```

## Usage

```php
use Zackad\GIS\Coordinate\Normalize as Coordinate;

$coord = new Coordinate;

echo $coord->normalizeLongitude(200);
// will output '-160'

echo $coord->normalizeLatitude(-200);
// will output '20'

echo $coord->normalize(541.45, -90.55);
// will output '[-178.55, -89.45]'
```

## API

`normalize($longitude, $latitude)` : return an array of coordinate point [x, y] or [longitude, latitude]

`normalizeLatitude($latitude)` : return normalized latitude coordinate whitin -90 < latitude < 90

`normalizeLongitude($longitude)` : return normalized longitude coordinate whitin -180 < longitude < 180
