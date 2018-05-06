<?php

namespace Amber\Benchmark;

class Benchmark
{
    public $steps = [];
    public $microtime;

    public function step(callable $callable)
    {
        $this->steps[] = new Step($callable);

        return $this;
    }

    public function times(int $times)
    {
        return $this->run($this->steps, $times);
    }

    public function run(array $steps, $times)
    {
        for ($x = 0; $x < count($steps); $x++) {
            echo "Starting test for step {$x}:\r\n";
            for ($y = 0; $y < $times; $y++) {
                $steps[$x]->start();
                $steps[$x]->callable();
                $steps[$x]->end();
            }
            echo "Total time for step {$x}: {$steps[$x]->total}\r\n";
        }
    }

    public function output()
    {
    }
}
