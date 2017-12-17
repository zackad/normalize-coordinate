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
            [0, 0],
            [10, 10],
            [10.123, 10.123],
            [180, 180],
            [190, -170],
            [200, -160],
            [190.5, -169.5],
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
}
