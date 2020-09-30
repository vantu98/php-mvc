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

    protected function postUploadImg()
    {
        // Count total files
        $countfiles = count($_FILES['files']['name']);

        // Upload directory
        $upload_location = "upload/";

        // To store uploaded files path
        $files_arr = array();

        // Loop all files
        for ($index = 0; $index < $countfiles; $index++) {
            // data
            $data = [];

            // File name
            $filename = $_FILES['files']['name'][$index];
            // Replace all special char to "-"
            $filename = preg_replace('/[^a-zA-Z0-9_.]/', "-", $filename);

            // Get extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            // Valid image extension
            $valid_ext = array("png", "jpeg", "jpg");

            // Check extension
            if (in_array($ext, $valid_ext)) {

                // File path
                $path = $upload_location . $filename;

                // Upload file
                if (move_uploaded_file($_FILES['files']['tmp_name'][$index], $path)) {
                    $files_arr[] = $path;
                    $data['slug'] = $path;
                    $data['name'] = $filename;

                    Galleries::addNew($data);
                }
            }
        }

        echo json_encode($files_arr);
        die;
    }
}
