<?php

namespace App\Admin\Models;

use Core\Model;
use PDOException;
use PDO;

class User extends Model
{
    public static function getAllUser()
    {
        $db = static::DB();

        $sql = "SELECT u.id, u.u_fullname, u.u_email, u.user_phone_num, us.us_name, us.us_class FROM users u INNER JOIN users__status us ON u.status_id = us.id";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getSingleUser($uID)
    {
        $db = static::DB();
        $sql = "SELECT u.id, u.u_name, u.u_email, u.u_fullname, u.u_address, u.user_phone_num, u.u_avatar, us.us_name, us.us_class FROM users u INNER JOIN users__status us ON u.status_id = us.id WHERE u.id = $uID";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getArea($uID)
    {
        $db = static::DB();

        $sql = "SELECT c.city_name, d.district_name FROM cites c INNER JOIN users u ON u.city_id = c.id INNER JOIN districts d ON d.id = u.district_id WHERE u.id = $uID";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getStatus()
    {
        $db = static::DB();

        $sql = "SELECT id, us_name FROM users__status";

        try {
            $stmt = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
