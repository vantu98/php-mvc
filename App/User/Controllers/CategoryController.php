<?php
namespace App\User\Controllers;

use App\Config;
use App\User\Models\Category;
use Core\View;

class CategoryController{
    public function index()
    {
        
    }
    public function getProductInCategory($categoryID)
    {
        $product = Category::getProductInCategoryByID($categoryID);

        View::renderTemplate('user', 'pages/shop.html', [
            'title' => 'Category',
            'product' => $product,
            'base_url' => Config::BASE_URL,
            'cat' => $categoryID
        ]);
    }
}