<?php

namespace Zackad\GIS\Coordinate;

/**
* A simple library to normalize geographic coordinate into valid range
* -180 < longitude < 180
* -90  < latitude  < 90
*/
class Normalize
{
    public function normalize($longitude)
    {
        $decimalPlaces = ((int) $longitude != $longitude) ? (strlen($longitude) - strpos($longitude, '.')) - 1 : 0;
        if ($longitude > 360) {
            $longitude = fmod($longitude, 360);
        }
        if ($longitude > 180) {
            $longitude = 0 - fmod($longitude, 180);
        }
        return number_format($longitude, $decimalPlaces);
    }
}
