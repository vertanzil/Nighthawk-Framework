<?php
/**
 * Created by PhpStorm.
 * User: Kyle
 * Date: 08/05/2022
 * Time: 19:35
 */

namespace App\classes\ErrorLogging;


use Exception;

/**
 * Class ErrorHandling
 * @package App\classes\ErrorLogging
 */
class ErrorHandling extends Exception
{
    public function exception_handler($exception)
    {
        echo "Uncaught exception: ", $exception->getMessage(), "\n";
    }
}

