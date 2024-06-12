<?php

namespace App\InterviewTests;

use App\Modules\Test;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;

class Test6 extends Test
{
    public $description = "save the following requestArray Data into orders and order_details table and return the Order object";

    public $requestArray = [
        'customer_id' => 3,
        'status' => 'SUBMITTED',
        'total_selling_price' => 0, // * have to calculate right selling price by the price of the product and quantity of the product
        'payment_method' => 'CASH ON DELIVERY',
        'order_details' => [
            [
                'product_id' => 1,
                'quantity' => 5
            ],
            [
                'product_id' => 7,
                'quantity' => 2
            ]
        ]
    ];

    public function run(): Order
    {
        // * write your code here *

        // ---------------

        // * Run your code by " php artisan run:test Test6 "
        return DB::transaction(function () {

            $totalSellingPrice = 0;
            foreach ($this->requestArray['order_details'] as $detail) {
                $product = Product::find($detail['product_id']);
                if ($product) {
                    $totalSellingPrice += $product->price * $detail['quantity'];
                }
            }


            $order = Order::create([
                'customer_id' => $this->requestArray['customer_id'],
                'status' => $this->requestArray['status'],
                'total_selling_price' => $totalSellingPrice,
                'payment_method' => $this->requestArray['payment_method']
            ]);


            foreach ($this->requestArray['order_details'] as $detail) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $detail['product_id'],
                    'quantity' => $detail['quantity']
                ]);
            }

            return $order;
        });



    }
}
