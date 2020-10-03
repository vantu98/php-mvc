<?php

namespace App\User\Models;

use PDO;
use Core\Model;
use PDOException;

class Category extends Model
{
    public function all()
    {
    }

    public static function getLimitCategory($limit = 8)
    {
        $db = static::DB();

        $sql = "SELECT c.c_name, c.c_slug, g.g_slug FROM categories c INNER JOIN galleries g ON g.id = c.gallery_id LIMIT $limit";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCatOfProduct($id)
    {
        $db = static::DB();

        $sql = "SELECT c.id, c.c_name from categories c INNER JOIN product__in_categories pic ON c.id = pic.c_id WHERE pic.p_id = $id";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
