<?php

namespace App\Admin\Models;

use PDO;
use Core\Model;
use PDOException;

class Categories extends Model
{
    public static function all()
    {
        $db = static::DB();

        $stmt = $db->query('SELECT * FROM categories');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addNew($data)
    {
        $db = static::DB();

        $sql = "INSERT INTO categories(id, gallery_id, c_name, c_desc, c_slug) VALUES(:id, :gallery_id, :c_name, :c_desc, :c_slug)";

        try {
            $db->prepare($sql)->execute($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function delete($slug)
    {
    }

    public static function getSingle($id)
    {
        $db = static::DB();

        $sql = "SELECT * FROM categories WHERE id = $id";

        $stmt = $db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function updateById($data)
    {
        $db = static::DB();

        $sql = "UPDATE categories SET c_name=:_name, c_desc=:_desc, c_slug=:_slug WHERE id=:_id";
        $db->prepare($sql)->execute($data);
    }
}
