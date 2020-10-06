<?php
namespace App\Admin\Controllers;

use App\Config;
use Core\View;

class UserController{
    public function index()
    {
        View::renderTemplate('admin', 'pages/all-user.html', [
            'base_url' => Config::BASE_URL,
            'title' => 'All User'
        ]);
    }
}