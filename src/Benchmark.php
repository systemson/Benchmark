<?php

namespace Amber\Benchmark;

class Benchmark
{
    public $steps = [];
    public $microtime;

    public function step(callable $callable, $name = null)
    {
        $this->steps[] = new Step($callable, $name);

        return $this;
    }

    public function times(int $times)
    {
        return $this->run($this->steps, $times);
    }

    public function run(array $steps, $times)
    {
        for ($x = 0; $x < count($steps); $x++) {
            $name = $steps[$x]->name ?? $x.' step';

            echo "\r\nStarting test for {$name}:\r\n";
            for ($y = 0; $y < $times; $y++) {
                $steps[$x]->start();
                $steps[$x]->callable();
                $steps[$x]->end();
            }


            echo "Total test time for {$name}: {$steps[$x]->total}\r\n";
        }
    }

    public function output()
    {
    }
}
