<?php

namespace Core;

class Auth
{
    /**
     * Check User Login
     * 
     * @return boolean
     */
    public static function isLogin()
    {
        if (isset($_COOKIE['user_login'])) {
            return true;
        }
        return false;
    }

    /**
     * Check if phone number is register
     * 
     * @param text phone number 09xxxxxxxx
     * @return boolean
     */
    public static function isPhoneNumberRegister()
    {
        
    }
}
