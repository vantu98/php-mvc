<?php
namespace App\User\Controllers;

use App\Config;
use App\User\Models\Category;
use App\User\Models\Product;
use Core\View;

class ShopController{
    public function index()
    {
        $title = 'Shop';
        $allProduct = Product::all();
        View::renderTemplate('user', 'pages/shop.html', [
            'title' => $title,
            'base_url' => Config::BASE_URL,
            'product'=>$allProduct
        ]);
    }
}