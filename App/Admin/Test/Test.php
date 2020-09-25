<?php

namespace App\Admin\Test;

use Core\Model;
use PDO;

class Test extends Model
{
    public static function sayHello()
    {
        return "Hello there";
    }

    public static function all()
    {
        $db = static::DB();
        $stmt = $db->query('SELECT * FROM categories');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
