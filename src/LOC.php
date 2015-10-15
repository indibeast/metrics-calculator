<?php
namespace Metrics;

class LOC {

    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function calculateLOC()
    {
        return 10;
    }
} 