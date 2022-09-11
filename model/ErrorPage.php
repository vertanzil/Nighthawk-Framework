<?php

namespace App\controllers;

use App\classes\builder\Pagebuilder;
use App\classes\Router;

/**
 * Class Error
 */
Class ErrorPage extends Router
{
    public static function render()
    {
        Pagebuilder::setCharset("utf-8");
        Pagebuilder::setViewport();
        echo "<head>";
        Pagebuilder::setpageTitle("Edit");
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

    public static function process($Errno)
    {
        if (!(error_reporting() & $Errno)) {
            return false;
        }
        switch ($Errno) {
            case 100:
                Echo "Error code: " . $Errno .
                    " The configuration file is either missing from the root directory, or is blank please regenerate.";
                break;
            case 101:
                Echo "Error code: " . $Errno .
                    " Unable to connect to the database, please check your database connection settings.";
                break;
            case 102:
                Echo "Error code: " . $Errno .
                    " the default table does not exist, please run setup.";
                break;
            case 103:
                Echo "Error code: " . $Errno . "
                 Unable to connect to the database, please check your database connection settings.";
                break;
            case 105:
                Echo "Error code: " . $Errno .
                    " Unable to load the Javascript file, please check log and that this exists and try again.";
                break;
            case 106:
                Echo "Error code: " . $Errno .
                    " Unable to load the CSS file, please check log and that this exists and try again.";
                break;
            case 107:
                Echo "Error code: " . $Errno .
                    "The specified table does not exist, please recheck the details or " . "<a href='index.php?url=Installation'>Click here to run set up</a>";
                break;
            default:
                echo 'Unknown error type:' . $Errno . '<br/>';
                break;
        }
        return null;
    }
}