<?php

namespace Core;

use App\Config;
use Exception;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    /**
     * Render a view file
     * 
     * @param string $role => location of view 
     * @param string $view => the view file
     * @param array $args => Associative array of data to display in the view
     * 
     * @return void
     */
    public static function render($role, $view, $args = [])
    {
        extract($args, EXTR_SKIP);

        if ($role === null) {
            $file = dirname(__DIR__) . "/App/views/$view";
        } else {
            $file = dirname(__DIR__) . "/App/$role/views/$view";
        }

        if (is_readable($file)) {
            require $file;
        } else {
            throw new Exception("$file not found");
        }
    }

    /**
     * Render a view template using Twig
     *
     * @param string $role
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate($role, $template, $args = [])
    {
        static $twig = null;

        if ($twig === null) {
            if ($role === null) {
                $loader = new FilesystemLoader(dirname(__DIR__) . "/App/views");
            } else {
                $loader = new FilesystemLoader(dirname(__DIR__) . "/App/$role/views");
            }

            $twig = new Environment($loader);
        }

        echo $twig->render($template, $args);
    }
}
