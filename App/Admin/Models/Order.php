<?php

namespace App\Admin\Models;

use Core\Model;
use PDO;
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
      * @param string user_email
      * 
      * @return array mess and order detail
      */
     public static function getOrderOfUser($order_id, $user_email)
     {
         $db=static::DB();
         $sql = "SELECT o.id, o.total, o.created_at,p.p_name, od.p_amount, od.p_unit_price FROM orders o INNER JOIN users u ON o.user_id = u.id INNER JOIN orders__detail od ON od.order_id = o.id INNER JOIN product p ON p.id = od.p_id WHERE u.u_email = '$user_email' AND o.id = $order_id";

         try {
             $stmt = $db->query($sql);
         } catch (PDOException $e) {
             echo $e->getMessage();
         }

         return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
}
