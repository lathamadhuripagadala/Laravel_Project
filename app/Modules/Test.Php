<?php

namespace App\Modules;

use Illuminate\Support\Benchmark;

abstract class Test
{
    public $description;

    public function handle()
    {
        $this->observe(fn () => $this->run());
    }

    public function observe(callable $callBack)
    {
        try {
            $measure = Benchmark::value($callBack);
            dump("Output : $measure[0]", "Query Execution Time : $measure[1] ms");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    abstract public function run();
}
