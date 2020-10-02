<?php

namespace App\Admin\Models;

use PDO;
use Core\Model;
use PDOException;

class Product extends Model
{
    public static function addNewProduct($data, $categoryList)
    {
        $db = static::DB();
        // $db = static::getDB();
        $sql = "INSERT INTO product(p_name, p_sku, p_desc, p_price, p_slug, p_feature_img) VALUES(:_name, :_sku, :_desc, :_price, :_slug, :_feature_img)";

        try {
            $db->prepare($sql)->execute($data);

            $p_id = $db->lastInsertId();

            foreach ($categoryList as $value) {
                $sql = "INSERT INTO product__in_categories(p_id, c_id) VALUES ($p_id, $value)";

                try {
                    $db->exec($sql);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function addProductInCat($data, $p_id)
    {
        $db = static::DB();

        foreach ($data as $value) {
            $sql = "INSERT INTO product__in_categories VALUES($p_id, $value)";

            try {
                $db->exec($sql);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    public static function getLastId($sku)
    {
        $db = static::DB();
        $sql = "SELECT id FROM product where p_sku = $sku";

        try {
            $stmt = $db->exec($sql);
        } catch (PDOException $e) {
            $stmt =  $e->getMessage();
        }

        return $stmt;
    }
}
