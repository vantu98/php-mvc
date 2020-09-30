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
        $db = static::DB();
        foreach ($data as $item ) {
            $sql = "INSERT INTO galleries (id, gt_id, g_slug, g_name) VALUES (NULL, 1, ".$item['slug'].", ".$item['name'].")";

            $db->exec($sql);
        }
    }

    public static function delete($slug)
    {
        
    }
}
