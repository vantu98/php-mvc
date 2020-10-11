<?php

namespace App\Admin\Models;

use Core\Model;
use PDOException;

class Order extends Model
{
    /**
     * Add value to table orders
     * 
     * @param int user_id
     * @param double total price
     * @param datetime order create time
     * 
     * @return boolean true or false
     */
    public static function createOrder($user_id, $total, $created_at, $data)
    {
        $db = static::DB();

        $sql = "INSERT INTO orders(id, user_id, total, created_at, updated_at) VALUES(NULL, $user_id, $total, '$created_at', NULL)";

        try {
            $db->exec($sql);

            $order_id = $db->lastInsertId();

            return $order_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Add detail to orders_detail
     * 
     * @param int order_id
     * 
     *
     * @param int product_id
     * @param int product amount
     * @param double product_unit_price
     * 
     * @return boolean is insert success
     */

     public static function addOrderDetail($order_id, $data)
     {
        $db = static::DB();

        foreach ($data as $item ) {
            $sql = "INSERT INTO orders__detail(order_id, p_id, p_amount, p_unit_price) VALUE ($order_id, :p_id, :p_amount, :p_unit_price)";

            try {
                $db->prepare($sql)->execute($item);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
     }

     /**
      * Find and return order of user
      * 
      * @param int order_id
      * @param int user_id
      * 
      * @return array mess and order detail
      */
}
