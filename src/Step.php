<?php

namespace Amber\Benchmark;

class Step
{
    public $callable = [];

    public $name;
    public $start;
    public $end;

    public $total;

    public function __construct(callable $callable, $name)
    {
        $this->callable = $callable;
        $this->name = $name;
    }

    public function start()
    {
        $this->start = microtime();
    }

    public function end()
    {
        $this->end = microtime();

        $this->total += abs($this->end - $this->start);
    }

    public function callable()
    {
        $this->callable->__invoke();
    }
}
