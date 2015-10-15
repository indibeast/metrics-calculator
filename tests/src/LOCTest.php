<?php
namespace Metrics\Test;

use Metrics\LOC;

class LOCTest extends \PHPUnit_Framework_TestCase {

    public function testloc()
    {
        $loc = new LOC('test');

       $this->assertEquals(1,$loc->calculateLOC());
    }
} 