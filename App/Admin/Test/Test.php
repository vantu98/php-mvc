<?php

namespace App\Admin\Test;

use PDO;
use Core\Model;

class Test extends Model
{
    public static function all()
    {
        $db = static::DB();
        $stmt = $db->query('SELECT * FROM categories');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
