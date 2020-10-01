<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Categories;
use App\Config;
use Core\View;

class ProductController
{
    public function index()
    {
        View::renderTemplate('Admin', 'pages/all-product.html', ['title' => 'All Products']);
    }
    public function allProduct()
    {
        View::renderTemplate('Admin', 'pages/all-product.html', ['title' => 'All Products']);
    }

    public function addNewProductView()
    {
        View::renderTemplate('admin', 'pages/upload-product.html', [
            'title' => 'Add new Product',
            'base_url' => Config::BASE_URL,
            'category' => Categories::all()
        ]);
    }
}
