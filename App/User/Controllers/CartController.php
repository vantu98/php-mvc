<?php

namespace App\User\Controllers;

use App\Config;
use App\User\Models\Category;
use App\User\Models\Product;
use Core\Auth;
use Core\View;

class CartController
{
    public function checkout()
    {
        View::renderTemplate('user', 'pages/checkout.html', [
            'title' => 'Checkout',
            'base_url' => Config::BASE_URL,
            'is_login' => Auth::isLogin(),
        ]);
    }
}
