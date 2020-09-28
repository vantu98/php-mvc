<?php

namespace App\Admin\Models;

use PDO;
use Core\Model;
use PDOException;

class Galleries extends Model
{
    public static function all()
    {
        $db = static::DB();

        $stmt = $db->query('SELECT * FROM galleries');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addNew($data)
    {
        
    }

    public static function delete($slug)
    {
        
    }
}
