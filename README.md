# PHP Normalize Coordinate

A simple library to normalize Geographic Coordinate System (GCS) so the coordinate will be in the range of

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
use Zackad\GIS\Coordinate\Normalize;

$coord = new Normalize;

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

## License

MIT License

Copyright (c) 2017 zackad

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
