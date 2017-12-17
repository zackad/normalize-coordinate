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
            [10, 10],
            [10.123, 10.123],
        ];
    }

    public function testCanCreateNormalizeClass()
    {
        $this->assertInstanceOf(Normalize::class, $this->coord);
    }

    /**
     * @dataProvider longitudeProvider
     */
    public function testNormalizeLongitudeGreaterThan180AndLessThan360ShouldReturnNegativeValue($input, $expected)
    {
        $this->assertEquals($expected, $this->coord->normalizeLongitude($input));
    }

    /**
     * @dataProvider longitudeProvider
     */
    public function testNormalizeLongitudeGreaterThan360ShouldReturnPositiveValue($input, $expected)
    {
        $this->assertEquals($expected, $this->coord->normalizeLongitude($input));
    }

    /**
     * @dataProvider longitudeProvider
     */
    public function testNormalizedShouldIncludeFloatingPoint($input, $expected)
    {
        $this->assertEquals($expected, $this->coord->normalizeLongitude($input));
    }

    /**
     * @dataProvider longitudeProvider
     */
    public function testNormalizeLongitudeLessThanMinus180ShouldReturnPositiveValue($input, $expected)
    {
        $this->assertEquals($expected, $this->coord->normalizeLongitude($input));
    }
}
