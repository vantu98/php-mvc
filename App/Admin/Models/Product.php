<?php

namespace App\Admin\Model;

use PDO;
use Core\Model;
use PDOException;

class Product extends Model
{
    public static function addNewProduct($data)
    {
        $db = static::DB();
        $sql = "INSERT INTO product(id, p_name, p_sku, p_desc, p_price, p_feature_img) VALUES(:_name, :_sku, :_desc, :_price, :_slug, :_g_id)";

        try {
            $db->prepare($sql)->exec($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function addProductInCat($data)
    {
    }
}
