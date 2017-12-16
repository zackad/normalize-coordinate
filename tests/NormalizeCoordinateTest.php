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

    public function testCanCreateNormalizeClass()
    {
        $this->assertInstanceOf(Normalize::class, $this->coord);
    }

    public function testNormalizeLongitudeGreaterThan180AndLessThan360ShouldReturnNegativeValue()
    {
        $this->assertEquals(-10, $this->coord->normalize(190));
    }

    public function testNormalizeLongitudeGreaterThan360ShouldReturnPositiveValue()
    {
        $this->assertEquals(10, $this->coord->normalize(370));
    }

    public function testNormalizedShouldIncludeFloatingPoint()
    {
        $this->assertEquals(12.12345, $this->coord->normalize(192.12345));
    }
}
