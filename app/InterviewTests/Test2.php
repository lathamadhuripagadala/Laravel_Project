<?php

namespace App\InterviewTests;

use App\Modules\Test;
use App\Models\Department;

class Test2 extends Test
{
    public $description = "return the department name from the departments table that has the most no of employees";

    // * example: return value "Data Science and Analytics"

    public function run(): string
    {
        // * write your code here *

        // ---------------

        // * Run your code by " php artisan run:test Test2 "
        $department = Department::withCount('employees')
            ->orderBy('employees_count', 'desc')
            ->first();


        return $department->name;


    }
}
