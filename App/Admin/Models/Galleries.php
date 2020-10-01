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

        $sql = "INSERT INTO galleries(id, gt_id, g_slug, g_name) VALUES (:id, :gt_id, :g_slug, :g_name)";

        try {
            $db->prepare($sql)->execute($data);
            // $db->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage() . "\n " . $e->getLine() . "\n " . $e->getFile();
        }
    }

    public static function delete($slug)
    {
    }
}
