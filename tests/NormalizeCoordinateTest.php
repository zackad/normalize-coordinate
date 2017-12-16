<?php

namespace Zackad\GIS\Coordinate\Test;

use PHPUnit\Framework\TestCase;
use Zackad\GIS\Coordinate\Normalize;

/**
* Test case for class NormalizeCoordinate
*/
final class NormalizeTest extends TestCase
{
    public function testCanCreateNormalizeClass()
    {
        $coordinate = new Normalize;
        $this->assertInstanceOf(Normalize::class, $coordinate);
    }

    public function testNormalizeLongitudeGreaterThan180Degre()
    {
        $coordinate = new Normalize;
        $this->assertEquals(-10, $coordinate->normalize(190));
    }
}
