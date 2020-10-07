<?php

namespace App\User\Controllers;

use App\Admin\Models\User;
use App\Config;
use Core\Auth;
use Core\View;

class AuthController
{
    public function signUpView()
    {
        view::renderTemplate('user', 'sign-up.html', [
            'base_url' => Config::BASE_URL
        ]);
    }

    public function postLogin()
    {
        $email = $_POST['email'];
        $passwd = Auth::encrypt($_POST['passwd']);

        $compare = User::getSingleByEmail($email, $passwd);

        $user = ['email' => $email, 'passwd' => $passwd];

        if ($compare == 1) {
            setcookie('user', $user, time() * 7200);
        } else {
            
        }
    }
}
