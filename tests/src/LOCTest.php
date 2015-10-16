<?php
namespace Metrics\Test;

use Metrics\LOC;
use Metrics\Reader;

class LOCTest extends \PHPUnit_Framework_TestCase {

    public function testBlankLines()
    {
        $loc = new LOC('sample');
        $metrices = $loc->calculate();
        $this->assertEquals(1,$metrices['no_of_blank_lines']);
        $this->assertEquals(8,$metrices['no_of_lines']);
        $this->assertEquals(1,$metrices['no_of_single_comments']);
    }
} 