<?php

use Core\Route;

require 'vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

date_default_timezone_set('Asia/Ho_Chi_Minh');

$router =  new Route;
