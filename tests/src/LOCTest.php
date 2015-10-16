<?php
namespace Metrics\Test;

use Metrics\LOC;
use Metrics\Reader;

class LOCTest extends \PHPUnit_Framework_TestCase {

    public function testloc()
    {
        $loc =  new LOC('sample');


       $this->assertEquals(18,$loc->calculateLOC());
    }
} 