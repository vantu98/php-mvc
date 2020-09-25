<?php

namespace Core;

use App\Config;
use PDO;

abstract class Model
{
    /**
     * get the PDO  database connection
     * 
     * @return mixed
     */
    public static function DB()
    {
        $db = null;
        if ($db === null) {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            $db = new PDO($dsn, Config::DB_USER, Config::DB_PASS);

            // throen an error
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $db;
    }
}
