<?php

namespace Zackad\GIS\Coordinate;

/**
* A simple library to normalize geographic coordinate into valid range
* -180 < longitude < 180
* -90  < latitude  < 90
*/
class Normalize
{
    /**
     * @param number $longitude     Longitude
     * @param number $latitude      Latitude
     * @return number[]             Coordinate with format [longitude, latitude]
     */
    public function normalize($longitude, $latitude)
    {
        return [
            $this->normalizeLongitude($longitude),
            $this->normalizeLatitude($latitude),
        ];
    }

    /**
     * @param number $longitude     Longitude
     * @return number               Normalized longitude
     */
    public function normalizeLongitude($longitude)
    {
        if (!is_numeric($longitude)) {
            throw new \InvalidArgumentException("Expecting numeric as argument, invalid data type given.");
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

    /**
     * @param number $latitude      Latitude
     * @return number               Normalized latitude
     */
    public function normalizeLatitude($latitude)
    {
        if (!is_numeric($latitude)) {
            throw new \InvalidArgumentException("Expecting numeric as argument, invalid data type given");
        }
        $decimalPlaces = ((int) $latitude != $latitude) ? (strlen($latitude) - strpos($latitude, '.')) - 1 : 0;
        if ($latitude >= 360) {
            $latitude = fmod($latitude, 360);
        }
        if ($latitude >= 180 || $latitude <= -180) {
            $latitude = 0 - fmod($latitude, 180);
        }
        if ($latitude > 90) {
            $latitude = 90 - fmod($latitude, 90);
        }
        if ($latitude < -90) {
            $latitude = -90 - fmod($latitude, 90);
        }
        return number_format($latitude, $decimalPlaces);
    }
}
