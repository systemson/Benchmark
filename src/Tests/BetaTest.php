<?php

namespace Amber\Benchmark\Tests;

use Amber\Benchmark\Benchmark;
use Amber\Cache\Cache;
use Amber\Cache\FileCache;
use Amber\Cache\JsonCache;
use Amber\Container\Injector;

class BetaTest extends Benchmark
{
    public $steps = [];

    public function test()
    {
        return $this->step(function () {
            $cache = new FileCache();
            $cache->set('key', 'value');
            $cache->get('key');
            $cache->has('key');
            $cache->delete('key');
        })->step(function () {
            $container = new Injector();
            $cache = $container->getInstanceOf(FileCache::class);
            $cache->set('key', 'value');
            $cache->get('key');
            $cache->has('key');
            $cache->delete('key');
        })->step(function () {
            Cache::set('key', 'value');
            Cache::get('key');
            Cache::has('key');
            Cache::delete('key');
        })->times(10000);
    }
}
