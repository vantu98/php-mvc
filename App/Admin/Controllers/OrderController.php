<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Order;

class OrderController
{
    /**
     * Create new order
     * Data load from ajax
     * @method POST
     * 
     * @return array if create order successfully
     * @return string "create order fail" if not create order
     */

    public function createOrder()
    {
        $userID = $_POST['userId'];
        $productList = $_POST['pList'];

        $productDetail = [];
        $total = 0;

        $result = false;

        foreach ($productList as $item) {
            $p = [
                'p_id' => $item['id'],
                'p_amount' => $item['amount'],
                'p_unit_price' => $item['price']
            ];

            array_push($productDetail, $p);

            $totalOfProduct = $item['amount'] * $item['price'];
            $total += $totalOfProduct;
        }

        $order_id = Order::createOrder($userID, $total, date("Y-m-d G:i:s"), $productDetail);

        Order::addOrderDetail($order_id, $productDetail);

        echo true;
    }
}
