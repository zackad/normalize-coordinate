<?php

namespace Zackad\GIS\Test;

use PHPUnit\Framework\TestCase;
use Zackad\GIS\NormalizeCoordinate;

/**
* Test case for class NormalizeCoordinate
*/
final class NormalizeCoordinateTest extends TestCase
{
    public function testCanCreateNormalizeCoordinateClass()
    {
        $coordinate = new NormalizeCoordinate();
    }
}
