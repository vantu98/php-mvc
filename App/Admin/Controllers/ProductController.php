<?php

namespace App\Admin\Controllers;

use Core\View;

class ProductController
{
    public function index()
    {
    }
    public function allProduct()
    {
        View::renderTemplate('Admin', 'pages/all-product.html', ['title' => 'All Products']);
    }
    
}
