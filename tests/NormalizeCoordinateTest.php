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

    /**
     * @dataProvider longitudeProvider
     */
    public function testNormalizeLongitudeWithVaroiusCase($input, $expected)
    {
        $this->assertEquals($expected, $this->coord->normalizeLongitude($input));
    }

    public function testNormalizeLongitudeWithoutArgumentThrowArgumentCountError()
    {
        $this->expectException(\ArgumentCountError::class);
        $this->coord->normalizeLongitude();
    }

    public function testNormalizeLongitudeWithInvalidDataThrowInvalidArgumenException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->coord->normalizeLongitude('');
    }
}
