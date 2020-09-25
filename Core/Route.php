<?php

namespace Core;

abstract class Route
{
    // protected $_route = [];

    protected $_role = 'user';
    protected $_controller = 'HomeController';
    protected $_action = 'index';
    protected $_params = [];

    public function __construct()
    {
        $dir = "App/";

        if (isset($_GET['role'])) {
            $this->_role = $_GET['role'];
            $dir .= $this->_role;
        }

        if (file_exists("App/$this->_role/Controllers/" . $_GET['controller'] . "controller.php")) {
            $this->_controller = $_GET['controller'] . "controller";
            $dir .= "/Controllers\/" . $this->_controller . ".php";
        }

        require $dir;
        $this->_controller = new $this->_controller;

        if (method_exists($this->_controller, $_GET['action'])) {
            $this->_action = $_GET['action'];
        }

        if (isset($_GET['params'])) {
            $this->_params = $this->_paramsProcession($_GET['params']);
        }

        call_user_func_array([$this->_controller, $this->_action], $this->_params);
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
