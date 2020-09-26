<?php

namespace App\Admin\Models;

use PDO;
use Core\Model;

class Categories extends Model
{
    public static function all()
    {
        $db = static::DB();

        $stmt = $db->query('SELECT * FROM categories');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}