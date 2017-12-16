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
        if ($longitude > 360) {
            $longitude = $longitude % 360;
        }
        if ($longitude > 180) {
            $longitude = 0 - ($longitude % 180);
        }
        return $longitude;
    }
}
