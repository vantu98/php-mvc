<?php

namespace App\User\Controllers;

use App\Admin\Models\User;
use App\Config;
use App\User\Models\Category;
use App\User\Models\Product;
use Core\Auth;
use Core\View;

class CartController
{
    public function checkout()
    {
        if (Auth::isLogin()) {
            $email = $_COOKIE['user'];
            $user = User::getSingleUserByEmail($email);
            $user = $user;
            
        } else {
            $user = -1;
        }

        View::renderTemplate('user', 'pages/checkout.html', [
            'title' => 'Checkout',
            'base_url' => Config::BASE_URL,
            'is_login' => Auth::isLogin(),
            'user' => $user
        ]);
    }
}
