<?php

namespace App\Admin\Controllers;

class OrderController{
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

        $productID = [];

        foreach ($productList as $item ) {
            array_push($productID, $item['id']);
        }

         var_dump($userID);
     }
}