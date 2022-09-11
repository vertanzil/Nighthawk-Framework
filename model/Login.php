<?php

namespace App\controllers;


use App\classes\builder\Pagebuilder;
use App\classes\Database\Database;
use App\classes\Database\SQLhousing;
use App\classes\enum\ErrorHandler;
use App\classes\Router;
use App\classes\SuperGlobals;


/**
 * Class Login
 * @package App\controllers
 */
Class Login extends Router
{

    public static function render()
    {
        Pagebuilder::setCharset("utf-8");
        Pagebuilder::setViewport();
        echo "<head>";
        Pagebuilder::setpageTitle("Login");
        Pagebuilder::loadJS("./views/js/jquery-3.5.1.min.js");
        Pagebuilder::loadCSS("./views/css/bootstrap.min.css");
        Pagebuilder::loadCSS("./views/css/bootstrap-grid.min.css");
        Pagebuilder::loadCSS("./views/css/bootstrap-utilities.min.css");
        Pagebuilder::loadCSS("./views/css/regular.css");
        Pagebuilder::loadCSS("./views/css/navigation.css");
        Pagebuilder::loadJS("./views/js/apexCharts.js");
        Pagebuilder::loadCSS("./views/js/app.js");
        Pagebuilder::loadCSS("./views/js/bootstrap.bundle.js");
        Pagebuilder::loadCSS("./views/css/all.css");
        Pagebuilder::loadJS("./views/js/all.js");
        Pagebuilder::loadJS("./views/js/fontawesome.js");
        echo "</head>";
    }

    /**
     *return string
     */
    static function init()
    {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        if (!isset($_SESSION)) {
            session_start();
        }
        $housing = new SQLhousing();
        $username_err = "";
        $password_err = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty(trim($_POST["username"]))) {
                $_SESSION["USERNAME_ERROR"] = ErrorHandler::NO_USERNAME;
            } else {
                $username = trim($_POST["username"]);
            }

            if (empty(isset($_POST["password"]))) {
                $_SESSION["PASSWORD_ERROR"] = ErrorHandler::NO_PASSWORD;
            } else {
                $password = trim($_POST["password"]);
            }
            if (empty($username_err) && empty($password_err)) {
                if ($stmt = mysqli_prepare($mysqli, $housing->sqlLogin())) {
                    mysqli_stmt_bind_param($stmt, "s", $param_username);
                    if (!empty($username)) {
                        /** @noinspection PhpUnusedLocalVariableInspection */
                        $param_username = $username;
                    }
                    if (mysqli_stmt_execute($stmt)) {
                        mysqli_stmt_store_result($stmt);
                        if (mysqli_stmt_num_rows($stmt) == 1) {
                            mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                            if (mysqli_stmt_fetch($stmt)) {
                                if (isset($password)) {
                                    if (password_verify($password, $hashed_password)) {
                                        session_start();
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $id;
                                        $_SESSION["username"] = $username;
                                        echo "success";
                                        header("Location: index.php?url=Index");
                                    } else {
                                        $_SESSION["PASSWORD_ERROR"] = ErrorHandler::WRONG_PASSWORD;
                                    }
                                }
                            }
                        } else {
                            /** @noinspection PhpUnusedLocalVariableInspection */
                            $username_err = "";
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    mysqli_stmt_close($stmt);
                }
            }
            mysqli_close($mysqli);
        }
    }

    /**
     * @return bool
     */
    public function getUsername()
    {
        $SuperGlobals = new SuperGlobals();
        return $SuperGlobals->getPost("username");
    }

    /**
     * @return bool
     */
    public function getPassword()
    {
        $SuperGlobals = new SuperGlobals();
        return $SuperGlobals->getPost("password");
    }
}
