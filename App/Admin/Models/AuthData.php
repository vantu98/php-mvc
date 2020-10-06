<?php

namespace App\Admin\Models;

use PDO;
use Core\Model;
use PDOException;

class AuthData extends Model
{
    public static function isPhoneNumerRegister($phone_num)
    {
        $db = static::DB();

        $sql = "SELECT user_phone_num FROM users WHERE user_phone_num = $phone_num";

        try {
            $result = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $result->fetchAll(PDO::FETCH_ASSOC);
        return $result->rowCount();
    }

    public static function checkUserEmail($email)
    {
        $db = static::DB();

        $sql = "SELECT u_email FROM users WHERE u_email = '$email'";

        try {
            $result = $db->query($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $result->fetchAll(PDO::FETCH_ASSOC);
        return $result->rowCount();
    }

    public static function registNewUser($data)
    {
        $db = static::DB();

        $sql = "INSERT INTO users(u_email, u_password, u_fullname, user_phone_num) VALUES (:_email, :_passwd, :_name, :_phone)";

        try {
            $db->prepare($sql)->execute($data);

            echo "Regist New User Successfully";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
