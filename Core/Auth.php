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
     * Encrypt data using openssl_cipher
     * 
     * @param string password or data that need to encrypt
     * 
     * @return string lenght = 50 encrypted string
     */
    public static function encrypt($str)
    {
        // Ciphering methods
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method 
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption 
        $encryption_iv = "1234567891011121";

        // Store the encryption key
        //les choses viennent est venu 
        $encryption_key = "leschosesviennentestvenu";

        // Use openssl_encrypt() function to encrypt the data 
        $encryption = openssl_encrypt(
            $str,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );

        return $encryption;
    }

    public static function decrypt($str)
    {
        // Ciphering methods
        $ciphering = "AES-128-CTR";
        
        // Non-NULL Initialization Vector for dencryption 
        $decryption_iv = "1234567891011121";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Store the dencryption key
        // les choses viennent est venu 
        $decryption_key = "leschosesviennentestvenu";

        // Use openssl_decrypt() function to decrypt the data 
        $decryption = openssl_decrypt(
            $str,
            $ciphering,
            $decryption_key,
            $options,
            $decryption_iv
        );

        return $decryption;
    }
}
