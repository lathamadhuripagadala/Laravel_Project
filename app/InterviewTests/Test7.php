<?php

namespace App\InterviewTests;

use App\Modules\Test;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class Test7 extends Test
{
    public $description = "return those orders with Order collection where order details are more than two";

    public function run(): Collection
    {
        // * write your code here *

        // ---------------

        // * Run your code by " php artisan run:test Test7 "
        $orders = Order::has('orderDetails', '>', 2)->get();

        return $orders;
    }
}
