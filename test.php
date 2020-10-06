<?php

use App\Admin\Models\User;

require('vendor/autoload.php');

$user = User::getSingleUser(3);

var_dump($user);