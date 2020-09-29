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
}

$id = 14;
$data = [
    '_name' => 'Test data',
    '_desc' => 'This is test data category description',
    '_slug' => 'test-data',
    '_id' => 15,
];

// Test::add($data);
try {
    Test::updateByID($data);

    echo "update success at id =" . $data['_id'];
} catch (PDOException $th) {
    echo $th->getMessage();
}
