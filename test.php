<?php

setcookie('test', 'abc', time() + 3600, "/");

if (isset($_COOKIE['test'])) {
    echo "set";
} else {
    echo "no";
}
