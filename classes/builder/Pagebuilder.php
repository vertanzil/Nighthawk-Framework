<?php
/**
 * Created by PhpStorm.
 * User: Kyle
 * Date: 02/05/2022
 * Time: 15:03
 */

namespace App\classes\builder;

use App\classes\ErrorLogging\FileLogger;
use Exception;


/**
 * Class Pagebuilder
 * @package App\controllers
 */
class Pagebuilder
{


    /**
     * @param $file
     */
    static function loadCSS($file)
    {
        $log = new FileLogger("./logs/Error.log");
        try {
            if (file_exists($file)) {
                echo '<link rel="stylesheet" href="' . $file . '">';
            } else {
                throw new Exception("Error unable to load  file" . " " . $file);
            }
        } catch (Exception $e) {
            $log->log("Unable to load CSS file" . " " . $file, FileLogger::ERROR);
            echo 'Message: ' . $e->getMessage();
            header("Location: ?url=Error&Errno=106");
        }
    }

    /**
     * @param $file
     */
    static function loadJS($file)
    {
        $log = new FileLogger("./logs/RuneLog.log");
        try {
            if (file_exists($file)) {
                echo '<script type="text/javascript" src="' . $file . '"></script>';
            } else {
                throw new Exception("Error unable to load  file" . " " . $file);
            }
        } catch (Exception $e) {
            $log->log("Unable to load Javascript file" . " " . $file, FileLogger::ERROR);
            echo 'Message: ' . $e->getMessage();
            header("Location: ?url=Error&Errno=105");
        }
    }

    /**
     * @param $pagetitle
     */
    static function setpageTitle($pagetitle)
    {
        echo '<title>' . "NightHawk Framework - " . $pagetitle . '</title>';
    }

    /**
     * @param $viewport
     */
    static function setCharset($viewport)
    {
        echo '<meta charset="' . $viewport . '">';
    }

    static function setViewport()
    {
        echo '  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
    }

    /**
     * @param $description
     */
    static function setDescription($description)
    {
        echo '<meta name="description" content=' . $description . '>';
    }

    /**
     * @param $keywords
     */
    static function setkeywords($keywords)
    {
        echo '<meta name="keywords" content=' . $keywords . '>';
    }

    /**
     * @param $author
     * @internal param $keywords
     */
    static function setAuthor($author)
    {
        echo '<meta name="author" content=' . $author . '>';
    }

}