<?php
namespace App\classes;

/**
 * Class Router
 * @package App\classes
 */
class Router
{

    public static $validRoutes = [];

    /**
     * @param $route
     * @param $function
     */
    public static function setView($route, $function)
    {
        self::$validRoutes[] = $route;
        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }


    /**
     * @param $viewName
     */
    public static function createView($viewName)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        ## include_once './templates/navtop.php';
        require_once "./views/$viewName" . '.php';
    }


}