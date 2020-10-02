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
}

$data = [
    '_id' => NULL,
    '_name' => 'Test Product',
    '_sku' => 'T0011',
    '_desc' => 'Test product part 1',
    '_price' => 999999,
    '_slug' => 't0011',
    '_feature_img' => 1
];

Test::addNewProduct($data);
