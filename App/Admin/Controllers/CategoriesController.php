<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Categories;
use App\Admin\Test\Test;
use Core\View;


class CategoriesController
{
    public function index()
    {
        $categories = Categories::all();
        // $categories = Test::all();
        View::renderTemplate('Admin', 'pages/categories.html', [
            'title' => 'Categories',
            'categories' => $categories,
        ]);
    }
}
