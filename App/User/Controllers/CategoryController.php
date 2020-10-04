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

        $title = $product[0]['c_name'];

        View::renderTemplate('user', 'pages/shop.html', [
            'title' => $title,
            'product' => $product,
            'base_url' => Config::BASE_URL
        ]);
    }
}