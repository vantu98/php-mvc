<?php

namespace App\User\Controllers;

use App\Config;
use App\User\Models\Category;
use App\User\Models\Product;
use Core\Auth;
use Core\View;

class HomeController
{
    public function index()
    {
        View::renderTemplate('user', 'pages/home.html', [
            'title' => 'Home',
            'base_url' => Config::BASE_URL,
            'product' => Product::getLimitProduct(8),
            'category' => Category::getLimitCategory(3),
            'is_login' => Auth::isLogin(),
        ]);
    }
}
