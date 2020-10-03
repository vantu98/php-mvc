<?php

namespace App\User\Models;

use PDO;
use Core\Model;
use PDOException;

class Product extends Model
{
    public function all()
    {
    }

    public static function getLimitProduct($limit = 8)
    {
        $db = static::DB();

        $sql = "SELECT p.p_name, p.p_sku, p.p_slug, p.p_desc, p.p_price, g.g_slug FROM product p INNER JOIN galleries g ON p.p_feature_img = g.id LIMIT $limit";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
