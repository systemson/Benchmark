<?php 

namespace Test;

require_once 'vendor/autoload.php';

use Amber\Benchmark\Benchmark;

class BenchmarkExample extends Benchmark
{
    public function testArrays()
    {
        $this->add('array', function () {
            $array = [];

            for ($x=0; $x < $n; $x++) {
                $array[] = $x;
            }

            foreach ($array as $value) {
                $value;
            }

            for ($x=0; $x < $n; $x++) {
                unset($array[$x]);
            }

            return $array;
        });

        $this->run();
    }
}

$tester = new BenchmarkExample();

$tester();
