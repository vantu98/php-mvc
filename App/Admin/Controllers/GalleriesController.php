<?php

namespace App\Admin\Controllers;

use App\Admin\Models\Galleries;
use App\Config;
use Core\View;

class GalleriesController
{
    public function index()
    {
        $galleries = Galleries::all();
        View::renderTemplate('admin', 'pages/galleries.html', ['title' => 'Galleries', 'data' => $galleries, 'base_url'=> Config::BASE_URL]);
    }

    public function uploadImage()
    {
        View::renderTemplate('admin', 'pages/upload-image.html', ['title' => 'Upload New Image']);
    }

    protected function postUploadImg()
    {
        //Count total files
        $totalFiles = count($_POST['data']['files']['name']);

        //Upload directory
        $uploadLocation = Config::BASE_URL."/uploads/";

        // to store uploaded files path
        $fileArr = [];

        // Loop all file
        for ($i=0; $i < $totalFiles; $i++) { 
            //File name
            // $filename = 
        }
    }
}
