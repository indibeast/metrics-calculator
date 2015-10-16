<?php
namespace Metrics;

class Stats {

    public static $totalLines = 0;


    public static function getTotalLines()
    {
        return self::$totalLines;
    }
}