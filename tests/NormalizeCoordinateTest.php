<?php

namespace Zackad\GIS\Coordinate\Test;

use PHPUnit\Framework\TestCase;
use Zackad\GIS\Coordinate\Normalize;

/**
* Test case for class Normalize
*/
final class NormalizeTest extends TestCase
{
    private $coord;

    public function setUp()
    {
        $this->coord = new Normalize;
        set_error_handler(array($this, 'errorHandler'));
    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        throw new \InvalidArgumentException(
            sprintf(
                "Missing argument. %s %s %s %s",
                $errno,
                $errstr,
                $errfile,
                $errline
            )
        );
    }

    public function coordinateDataProvider()
    {
        $longitude = $this->longitudeProvider();
        $latitude = $this->latitudeProvider();
        $coorSize = min(count($longitude), count($latitude));
        $coord = [];
        for ($i=0; $i < $coorSize; $i++) {
            array_push($coord, [
                $longitude[$i][0],
                $latitude[$i][0],
                [
                    $longitude[$i][1],
                    $latitude[$i][1],
                ]
            ]);
        }
        return $coord;
    }

    public function latitudeProvider()
    {
        return [
            [-370, 10],
            [-360, 0],
            [-330.55, 29.45],
            [-300, 60],
            [-200.12345, 20.12345],
            [-200, 20],
            [-180, 0],
            [-120, -60],
            [-90.55, -89.45],
            [-90, -90],
            [-10.1233, -10.1233],
            [-10, -10],
            [0, 0],
            [10, 10],
            [10.1234, 10.1234],
            [90, 90],
            [91, 89],
            [91.55, 88.45],
            [120, 60],
            [180, 0],
            [200, -20],
            [270, -90],
            [360, 0],
            [370, 10],
            [370.12345, 10.12345],
        ];
    }

    public function longitudeProvider()
    {
        return [
            [-540.55, 179.45],
            [-540, -180],
            [-370.45, -10.45],
            [-370, -10],
            [-360, 0],
            [-190.55, 169.45],
            [-190, 170],
            [-180, -180],
            [-10.123, -10.123],
            [0, 0],
            [10, 10],
            [10.123, 10.123],
            [180, 180],
            [190, -170],
            [200, -160],
            [190.5, -169.5],
            [360, 0],
            [370.123, 10.123],
            [541, -179],
            [541.45, -178.55],
        ];
    }

    public function invalidDataProvider()
    {
        return [
            [''],
            ['hello'],
            [$this],
            [[]],
            [array()],
        ];
    }

    /**
     * @dataProvider longitudeProvider
     */
    public function testNormalizeLongitudeWithVaroiusCase($input, $expected)
    {
        $this->assertEquals($expected, $this->coord->normalizeLongitude($input));
    }

    /**
     * @dataProvider latitudeProvider
     */
    public function testNormalizeLatitudeWithVariousCase($input, $expected)
    {
        $this->assertEquals($expected, $this->coord->normalizeLatitude($input));
    }

    public function testNormalizeLongitudeWithoutArgumentThrowArgumentCountError()
    {
        if (version_compare(PHP_VERSION, '7.1', '>=')) {
            $this->expectException(\ArgumentCountError::class);
            $this->coord->normalizeLongitude();
        } else {
            $this->expectException(\InvalidArgumentException::class);
            $this->coord->normalizeLatitude();
        }
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function testNormalizeLongitudeWithInvalidDataThrowInvalidArgumenException($invalid)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->coord->normalizeLongitude($invalid);
    }

    public function testNormalizeLatitudeWithoutArgumentThrowArgumentCountError()
    {
        if (version_compare(PHP_VERSION, '7.1', '>=')) {
            $this->expectException(\ArgumentCountError::class);
            $this->coord->normalizeLatitude();
        } else {
            $this->expectException(\InvalidArgumentException::class);
            $this->coord->normalizeLatitude();
        }
    }

    /**
     * @dataProvider invalidDataProvider
     */
    public function testNormalizeLatitudeWithInvalidDataThrowInvalidArgumentException($invalid)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->coord->normalizeLatitude($invalid);
    }

    /**
     * @dataProvider coordinateDataProvider
     */
    public function testNormalizeLongitudeAndLongitude($longitude, $latitude, $expected)
    {
        $this->assertEquals($expected, $this->coord->normalize($longitude, $latitude));
    }
}
