<?php

namespace App\Admin\Models;

use PDO;
use Core\Model;
use PDOException;

class Product extends Model
{
    public static function all()
    {
        $db = static::DB();
        $sql = "SELECT p.id, p.p_name, p.p_sku, p.p_slug, p.p_desc, p.p_price FROM product p ORDER BY id desc";

        $stmt = $db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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

    public static function getSingle($p_id)
    {
        $db = static::DB();
        $sql = "SELECT p.id, p.p_name, p.p_sku, p.p_desc, p.p_slug, p.p_price, g.g_slug, g.id as g_id FROM product p INNER JOIN galleries g ON p.p_feature_img = g.id WHERE p.id = $p_id";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProductInCat($p_id)
    {
        $db = static::DB();
        $sql = "SELECT c.id, c.c_name FROM categories c INNER JOIN product__in_categories pic on c.id = pic.c_id INNER JOIN product p ON p.id = pic.p_id WHERE p.id = $p_id";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateSingleProductById($p_id, $data)
    {
        $db = static::DB();
        $sql = "UPDATE product SET p_name=:_name, p_sku=:_sku, p_desc=:_desc, p_price=:_price, p_slug=:_slug, p_feature_img=:_feature_img WHERE id=$p_id";

        $stmt=$db->prepare($sql);
        $stmt->execute($data);
    }
}
