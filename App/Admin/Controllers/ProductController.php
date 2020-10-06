<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Product;
use App\Admin\Models\Categories;
use App\Config;
use Core\View;

class ProductController
{
    public function index()
    {
        $products = Product::all();
        View::renderTemplate('Admin', 'pages/all-product.html', ['title' => 'All Products', 'products' => $products, 'base_url' => Config::BASE_URL]);
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

    public function postAddNewProduct()
    {
        $data = $_POST['product'];
        $categoryList = $_POST['pInCat'];

        $sku = $data['_sku'];
        Product::addNewProduct($data, $categoryList);
    }

    public function editProductView($params)
    {
        $product = Product::getSingle($params);
        $allCategories = Categories::all();
        $productInCategory = Product::getProductInCat($params);

        /**
         * Process product in category
         * 
         * @return @array 
         */
        $processed_pic = [];
        foreach ($productInCategory as $item) {
            $processed_pic[] = $item['id'];
        }

        for ($i = 0; $i < count($allCategories); $i++) {
            if (in_array($allCategories[$i]['id'], $processed_pic)) {
                $allCategories[$i]['is_check'] = true;
            } else {
                $allCategories[$i]['is_check'] = false;
            }
        }


        View::renderTemplate('admin', 'pages/edit-product.html', [
            'title' => 'Edit Product',
            'product' => $product[0],
            'base_url' => Config::BASE_URL,
            'category' => $allCategories
        ]);
    }

    public function postUpdateProduct($p_id)
    {
        $productList = $_POST['product'];
        $pID = $_POST['pID'];

        Product::updateSingleProductById($pID, $productList);
        echo $p_id;
    }

    public function postDeleteProduct($p_id)
    {
        
        Product::deleteSingleProductByID($p_id);

        echo "delete product successfully";
    }
}
