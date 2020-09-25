<?php

namespace App\Admin\Controllers;

use Core\View;

class LoginController
{
    public function loginForm()
    {
        View::renderTemplate('admin', 'login.html', []);
    }
}
