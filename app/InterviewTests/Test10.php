<?php

namespace App\InterviewTests;

use App\Modules\Test;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class Test10 extends Test
{
    public $description = "Find the order with height selling price";

    public function run(): Order
    {
        // * write your code here *

        // ---------------

        // * Run your code by " php artisan run:test Test10 "
        $order = Order::orderBy('total_selling_price', 'desc')->first();

        return $order;
    }
}
