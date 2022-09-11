<?php

namespace App\controllers;


use App\classes\Database\Database;

/**
 * Class Controller
 * @package App\controllers
 */
Class Controller
{

    /**
     * @param $viewName
     */
    public static function createView($viewName)
    {
        $db = Database::getInstance();
        if (!$db->tableExist()) {
            header("Location: index.php?url=Error&Result=Setup");
        } else {
            $db->installFldrcheck();
        }

        if (!isset($_SESSION)) {
            session_start();
        }
        include_once './templates/Navigation.php';
        require_once "./views/$viewName" . '.php';
    }
}

