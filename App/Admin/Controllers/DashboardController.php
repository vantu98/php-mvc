<?php

namespace App\Admin\Controllers;

use Core\View;

class DashBoardController
{
    public function index()
    {
        View::renderTemplate('Admin', 'pages/dashboard.html', ['title' => 'Dashboard']);
    }
}
