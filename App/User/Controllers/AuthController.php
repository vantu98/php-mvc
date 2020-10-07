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

        if ($compare == 1) {
            setcookie('user', $email, time() + Config::COOKIES_EXPIRE);
            echo "cookie is set";
            echo $compare;
        } else {
            echo $compare;
        }
    }
}
