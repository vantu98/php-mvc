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
        View::renderTemplate('admin', 'pages/galleries.html', ['title' => 'Galleries', 'data' => $galleries, 'base_url' => Config::BASE_URL]);
    }

    public function uploadImage()
    {
        View::renderTemplate('admin', 'pages/upload-image.html', ['title' => 'Upload New Image']);
    }

    public function postUploadImage()
    {
        //response array
        $response = [];

        // Count total files
        $count_files = count($_FILES['files']['name']);

        // upload dỉrectory
        $upload_dir = "uploads/";

        // Store uploaded files path
        $files_arr = [];

        // Loop all files from form data
        for ($i = 0; $i < $count_files; $i++) {
            // Get file name
            $file_name = $_FILES['files']['name'][$i];
            // Replace all special char to "-"
            $file_name = preg_replace('/[^a-zA-Z0-9_.]/', "-", $file_name);
            //Replace all whitespace to underscore
            $file_name = str_replace(" ", "-", $file_name);

            // Get extension of image
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);

            // Valid image extension
            $valid_ext = ["png", "jpeg", "jpg"];

            if (in_array($ext, $valid_ext)) {
                $path = $upload_dir . $file_name;

                if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $path)) {
                    $files_arr[] = $path;

                    // after upload image successfull
                    // save image url to database
                    $data = [
                        'id' => NULL,
                        'gt_id' => '1',
                        'g_slug' => Config::BASE_URL . "/" . $path,
                        'g_name' => $file_name,
                    ];

                    Galleries::addNew($data);
                }
            }
        }

        echo json_encode($files_arr);
        die;
    }

    public function getAllImgAjax()
    {
        echo json_encode(Galleries::all());
        die;
    }
}
