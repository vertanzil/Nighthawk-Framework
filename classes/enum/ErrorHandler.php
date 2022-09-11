<?php

namespace App\classes\enum;

use App\classes\functions\Enumcheck;

/**
 * Class ErrorHandler
 * @package App\classes
 */
class ErrorHandle1r extends Enumcheck
{
    const NO_USERNAME = "Please enter a username.";
    const NO_MODEL_FOUND = "Sorry no models have been found please create a model file in  ./model";
    const NO_PASSWORD = "Please enter a password.";
    const WRONG_PASSWORD = "Sorry you have entered the incorrect password.";
    const FATAL_ERROR = "whoops";
    const CONFIG_FILE_MISSING = "The config.json file in the directory root is missing";
    const NOT_LOGGED_IN = "Sorry you are not logged in and are unable to access this page.";
}