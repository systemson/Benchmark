<?php

namespace Amber\Benchmark\Tests;

use Amber\Benchmark\Benchmark;
use Amber\Cache\Cache;
use Amber\Cache\Driver\SimpleCache;
use Amber\Cache\Driver\JsonCache;
use Amber\Cache\Driver\ApcuCache;
use Amber\Cache\Driver\ArrayCache;
use Amber\Container\Injector;

class BetaTest extends Benchmark
{
    public $steps = [];

    public function test()
    {
        return $this->step(function () {
            $file = new SimpleCache();
            $json = new JsonCache();
            $array = new ArrayCache();
            $apcu = new ApcuCache();
        }, 'Instance Test')->step(function () {
            $container = new Injector();

            $container->bind(SimpleCache::class);

            $file = $container->get(SimpleCache::class);
        }, 'Container Test')->times(1);
    }
}
