<?php

namespace App\controllers;

use App\classes\builder\Pagebuilder;
use App\classes\Router;


/**
 * Class RecoverPassword
 */
Class RecoverPassword extends Router
{
    public static function render()
    {
        Pagebuilder::setCharset("utf-8");
        Pagebuilder::setViewport();
        echo "<head>";
        Pagebuilder::setpageTitle("RecoverPassword");
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
}