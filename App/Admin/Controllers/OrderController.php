<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Order;
use App\Config;
use Core\View;

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

        echo $order_id;
    }

    /**
     * Return order detail of specific client
     * 
     * @param int order number (order_id)
     * @return view order detail
     */
    public function orderDetail($order_id)
    {
        //get order
        View::renderTemplate('user', 'pages/order-detail', [
            'title' => 'Order Detail',
            'base_url' => Config::BASE_URL,
            
        ]);
    }

    /**
     * Return order data of specific user and order
     * 
     * @param 
     * @param 
     * 
     * @return
     */
    public function getOrderDetail($order_id)
    {
        
    }
}
