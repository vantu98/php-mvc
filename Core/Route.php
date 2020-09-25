<?php

namespace Core;

class Route
{
    protected $_route = [];

    protected $_role = 'User';
    protected $_controller = 'HomeController';
    protected $_action = 'index';
    protected $_params = [];

    public function __construct()
    {
        if (isset($_GET['role'])) {
            $this->_role = ucfirst($_GET['role']);
        }
        if (isset($_GET['controller'])) {
            $this->_controller = ucfirst($_GET['controller']) . "Controller";
        }
        if (isset($_GET['action'])) {
            $this->_action = $_GET['action'];
        }
        if (isset($_GET['params'])) {
            $this->_params = $this->_paramsProcession($_GET['params']);
        }

        //namespace
        // App/$role/Controllers/$controllerController.php
        $namespace = "App\\" . $this->_role . "\\Controllers\\" . $this->_controller;

        $obj = new $namespace;

        call_user_func_array([$obj, $this->_action], $this->_params);

        // $this->_route['role'] = $this->_role;
        // $this->_route['controller'] = $this->_controller;
        // $this->_route['action'] = $this->_action;
        // $this->_route['params'] = $this->_params;
    }

    public function getRoute()
    {
        return $this->_route;
    }

    protected function _paramsProcession($args)
    {
        return explode("/", filter_var(trim($args)));
    }
}
