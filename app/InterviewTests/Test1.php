<?php

namespace App\InterviewTests;

use App\Modules\Test;
use App\Models\Employee;

class Test1 extends Test
{
    public $description = "return the name of the employee from the employees table who is receiving the second highest salary";

    // * example: return value "john"

    public function run():string
    {
        // * write your code here *

        // ---------------

        // * Run your code by " php artisan run:test Test1 "

        $employee = Employee::orderBy('salary_per_annum', 'desc')->skip(1)->first();
        return $employee->name;
    }
}
