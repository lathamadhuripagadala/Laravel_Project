<?php

namespace App\InterviewTests;

use App\Modules\Test;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class Test9 extends Test
{
    public $description = "Delete those order where status is 'DRAFT'";

    public function run(): bool
    {
        // * write your code here *

        // ---------------

        // * Run your code by " php artisan run:test Test9 "
        $delete = Order::where('status', 'DRAFT')->delete();
    }
}
