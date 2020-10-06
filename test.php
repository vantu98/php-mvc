<?php

if (isset($_GET['params'])) {
    $params = processParam();
    var_dump($params);
}

function processParam()
{
    if (isset($_GET['params'])) {
        return explode("/", filter_var(trim($_GET['params'])));
    }
    return [];
}