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
}
