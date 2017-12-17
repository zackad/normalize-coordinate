<?php

namespace Zackad\GIS\Coordinate;

/**
* A simple library to normalize geographic coordinate into valid range
* -180 < longitude < 180
* -90  < latitude  < 90
*/
class Normalize
{
    public function normalizeLongitude($longitude)
    {
        if (strlen((string) $longitude) < 1) {
            throw new \InvalidArgumentException("Number or string number is expected, empty/invalid argument given", 1);
        }
        $decimalPlaces = ((int) $longitude != $longitude) ? (strlen($longitude) - strpos($longitude, '.')) - 1 : 0;
        if ($longitude >= 360 || $longitude <= -360) {
            $longitude = fmod($longitude, 360);
        }
        if ($longitude > 180) {
            $longitude = -180 + fmod($longitude, 180);
        }
        if ($longitude < -180) {
            $longitude = 180 + fmod($longitude, 180);
        }
        return number_format($longitude, $decimalPlaces);
    }
}
