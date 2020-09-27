<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Categories;
use App\Admin\Test\Test;
use Core\View;
use App\Config;
use PDOException;

class CategoriesController
{
    public function index()
    {
        $categories = Categories::all();

        // $categories = Test::all();
        View::renderTemplate('Admin', 'pages/categories.html', [
            'title' => 'Categories',
            'categories' => $categories,
            'base_url' => Config::BASE_URL
        ]);
    }

    public function postAddNewCategory()
    {
        $data = [
            'id' => NULL,
            'gallery_id' => '1',
            'c_name' => $_POST['c_name'],
            'c_desc' => $_POST['c_desc'],
            'c_slug' => $_POST['c_slug'],
        ];

        try {
            Categories::addNew($data);

            $response = [
                'type' => 'success',
                'message' => "Add new category: " . $_POST['c_name'] . " sucessfully",
            ];
        } catch (PDOException $e) {
            $response = [
                'type' => 'error',
                'message' => $e->getMessage(),
            ];
        }

        echo json_encode($response);
    }
}
