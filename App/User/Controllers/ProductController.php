<?php

namespace App\User\Controllers;

use App\Config;
use App\User\Models\Category;
use App\User\Models\Product;
use Core\View;

class ProductController
{
    public function index()
    {

    }

    public function detail($id)
    {

        $title = 'Detail';

        View::renderTemplate('user', 'pages/detail-product.html', [
            'title' => $title,
            'base_url' => Config::BASE_URL,
            'product' => Product::getSingleProduct($id)[0],
            'pic' => Category::getCatOfProduct($id)
        
        ]);
    }
}
