<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Order;
use App\Admin\Models\User;
use App\Config;
use Core\Mail;
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
        $user_email = $_COOKIE['user'];

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

        //send mail
        Mail::sendMail($user_email);

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
        $user_email = $_COOKIE['user'];

        $orders = Order::getOrderOfUser($order_id, $user_email);
        $user = User::getSingleUserByEmail($user_email)[0];
        //var_dump($orders);

        View::renderTemplate('user', 'pages/order-detail.html', [
            'title' => 'Order Detail',
            'base_url' => Config::BASE_URL,
            'orders' => $orders,
            'order' => array_shift($orders),
            'user' => $user
        ]);
    }
}
