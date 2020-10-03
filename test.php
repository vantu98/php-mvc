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
}

$product = Test::getProductBySKU($_GET['sku']);

var_dump($product);

echo $product[0]['p_name'];