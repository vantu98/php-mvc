<?php

use Core\Model;
use App\Config;

require 'vendor/autoload.php';

class Test extends Model
{
    public static function getDB()
    {
        $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            try {
                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASS);

                // throen an error
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo "connect success";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $db;
    }

    public static function add($data)
    {
        $db = static::getDB();

        $sql = "INSERT INTO categories(id, gallery_id, c_name, c_desc, c_slug) VALUES(:id, :gallery_id, :c_name, :c_desc, :c_slug)";

        try {
            $db->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateByID($data)
    {
        $db = static::getDB();

        $sql = "UPDATE categories SET c_name=:_name, c_desc=:_desc, c_slug=:_slug WHERE id=:_id";
        $db->prepare($sql)->execute($data);
    }

    public static function uploadImgae($data)
    {
        $db = static::getDB();

        $sql = "INSERT INTO galleries(id, gt_id, g_slug, g_name) VALUES (:id, :gt_id, :g_slug, :g_name)";

        try {
            $db->prepare($sql)->execute($data);
            // $db->exec($sql);


        } catch (PDOException $e) {
            echo $e->getMessage() . "\n " . $e->getLine() . "\n " . $e->getFile();
        }
    }

    public static function addNewProduct($data)
    {
        $db = static::getDB();
        $sql = "INSERT INTO product(id, p_name, p_sku, p_desc, p_price, p_slug, p_feature_img) VALUES(:_id, :_name, :_sku, :_desc, :_price, :_slug, :_feature_img)";

        $stmt = $db->prepare($sql);

        try {
            $db->prepare($sql)->execute($data);

            echo $db->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllProduct()
    {


        $db = static::getDB();
        $sql = "SELECT p.id, p.p_name, p.p_sku, p.p_slug,c.c_name FROM product p INNER JOIN product__in_categories pic ON p.id = pic.p_id INNER JOIN categories c ON c.id = pic.c_id";

        $stmt = $db->query($sql);

        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public static function getSingle($p_id)
    {
        $db = static::getDB();
        $sql = "SELECT * FROM product WHERE id = $p_id";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getSingleProduct($p_id)
    {
        $db = static::getDB();
        $sql = "SELECT p.id, p.p_name, p.p_sku, p.p_desc, p.p_slug, p.p_price, g.g_slug FROM product p INNER JOIN galleries g ON p.p_feature_img = g.id WHERE p.id = $p_id";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProductInCat($p_id)
    {
        $db = static::getDB();
        $sql = "SELECT c.id FROM categories c INNER JOIN product__in_categories pic on c.id = pic.c_id INNER JOIN product p ON p.id = pic.p_id WHERE p.id = $p_id";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function allCat()
    {
        $db = static::getDB();

        $stmt = $db->query('SELECT * FROM categories');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$allCat = Test::allCat();
$productInCat = Test::getProductInCat(6);

$processed_array = [];

foreach ($productInCat as $value) {
    $processed_array[] = $value['id'];
}

var_dump($processed_array);

for ($i = 0; $i < count($allCat); $i++) {
    if (in_array($allCat[$i]['id'], $processed_array)) {
        $allCat[$i]['is_check'] = true;
    } else {
        $allCat[$i]['is_check'] = false;
    }
}

var_dump($allCat);
