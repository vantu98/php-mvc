<?php

namespace Core;

abstract class Route
{
    protected $_route = [];

    protected $_role = 'user';
    protected $_controller = 'HomeController';
    protected $_action = 'index';
    protected $_params = [];

    public function __construct()
    {
        if (isset($_GET['role'])) {
            $this->_role = $_GET['role'];
        }
        if (isset($_GET['controller'])) {
            $this->_controller = $_GET['controller'];
        }
        if (isset($_GET['action'])) {
            $this->_action = $_GET['action'];
        }
        if (isset($_GET['params'])) {
            $this->_params = $this->_paramsProcession($_GET['params']);
        }

        $this->_route['role'] = $this->_role;
        $this->_route['controller'] = $this->_controller;
        $this->_route['action'] = $this->_action;
        $this->_route['params'] = $this->_params;
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
