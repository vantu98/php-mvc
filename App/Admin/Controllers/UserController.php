<?php

namespace App\Admin\Controllers;

use App\Admin\Models\User;
use App\Config;
use Core\View;

class UserController
{
    public function index()
    {
        $user = User::getAllUser();
        View::renderTemplate('admin', 'pages/all-user.html', [
            'base_url' => Config::BASE_URL,
            'title' => 'All User',
            'user' => $user
        ]);
    }

    public function editUserView($uId)
    {
        $user = User::getSingleUser($uId);
        $user = array_shift($user);

        $area = User::getArea($uId);

        $status = User::getStatus();

        View::renderTemplate('admin', 'pages/edit-user.html', [
            'base_url' => Config::BASE_URL,
            'title' => 'Edit User',
            'user' => $user,
            'area' => array_shift($area),
            'status' => $status
        ]);

        echo $user;
    }
}
