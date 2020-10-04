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
        $product = Product::getSingleProduct($id);
        $product = array_shift($product);
        $title = $product['p_name'];

        View::renderTemplate('user', 'pages/detail-product.html', [
            'title' => $title,
            'base_url' => Config::BASE_URL,
            'product' => $product,
            'pic' => Category::getCatOfProduct($id)
        
        ]);
    }
}
