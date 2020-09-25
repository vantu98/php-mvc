<?php

// use App\Admin\Model\Home;

use App\Admin\Test\Test;
require 'vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


// $goodbye = Home::sayGoodbye();
$greet = Test::sayHello();

echo $greet;

var_dump(Test::all());