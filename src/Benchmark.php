<?php

namespace Amber\Benchmark;

use Lavoiesl\PhpBenchmark\Benchmark as BaseBenchmark;

class Benchmark extends BaseBenchmark
{
	public function __invoke()
	{
		var_dump(get_class_methods($this));
	}
}
