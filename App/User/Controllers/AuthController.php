<?php

namespace App\User\Controllers;

use App\Admin\Models\Auth;
use App\Config;
use Core\View;

class AuthController{
    public function signUpView()
    {
        view::renderTemplate('user', 'sign-up.html', [
            'base_url' => Config::BASE_URL
        ]);
    }

    
}