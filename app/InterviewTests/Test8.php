<?php

namespace App\InterviewTests;

use App\Modules\Test;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class Test8 extends Test
{
    public $description = "return the total spending in 2022 on order of customer id 5";

    public function run(): float
    {
        // * write your code here *

        // ---------------

        // * Run your code by " php artisan run:test Test8 "
        $totalSpending = Order::where('customer_id', '5')
            ->whereBetween('created_at', ['2022-01-01 00:00:00', '2022-12-31 23:59:59'])
            ->sum('total_selling_price');

        return $totalSpending;
    }
}
