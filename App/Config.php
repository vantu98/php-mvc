<?php

namespace App;

class Config
{
    /**
     * Database host
     * 
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * 
     * @var string
     */
    const DB_NAME = 'PHP2_STORE';
    /**
     * Database user
     * 
     * @var string
     */
    const DB_USER = 'root';
    /**
     * Database password
     * 
     * @var string
     */
    const DB_PASS = 'root';

    /**
     * Show errors
     * 
     * @var boolean
     */
    const SHOW_ERRORS = true;

    /**
     * Base URL
     * 
     * @var string
     */
    const BASE_URL = "http://localhost/php_2/php-mvc";

    /**
     * Cookies expire
     * cookies'll be expired after 1 week (7 days)
     * 
     * @var number
     */
    const COOKIES_EXPIRE = 86400;

    /**
     * MAIL CONFIG
     */

    /**
     * Host mail config
     * 
     * @var mail
     * @var password
     */
    const MAIL_USERNAME = "tu.testweb@gmail.com";
    const MAIL_PASSWORD = "tutestwebUU9";
    const MAIL_HOST = "smtp.gmail.com";
}
