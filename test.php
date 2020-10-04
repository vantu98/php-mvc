<?php

use Core\Model;
use App\Config;

require 'vendor/autoload.php';

class Test extends Model
{
    public static function getProductBySKU($sku)
    {
        $db = static::DB();

        $sql = "SELECT p.p_name, p.p_sku, p.p_desc, p.p_price, g.g_slug FROM product p INNER JOIN galleries g ON p.p_feature_img = g.id WHERE p_sku = '$sku'";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getSingleProduct($id)
    {
        $db = static::DB();

        $sql = "SELECT p.id, p.p_name, p.p_sku, p.p_desc, p.p_price, g.g_slug FROM product p INNER JOIN galleries g ON p.p_feature_img = g.id WHERE p.id = $id";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$product = Test::getSingleProduct(11);
$product = array_shift($product);
var_dump($product['p_name']);

// echo $product[0]['p_name'];

