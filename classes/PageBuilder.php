<?php

namespace App\classes;


/**
 * Class pageBuilder
 * @package App\classes
 */
class Pagebuilder
{

    /**
     * @param $file
     */
    static function loadCSS($file)
    {
        echo '<link rel="stylesheet" href="' . $file . '">';
    }

    /**
     * @param $file
     */
    static function loadJS($file)
    {
        echo '<script type="text/javascript" src="' . $file . '"></script>';
    }

    /**
     * @param $pagetitle
     */
    static function setpageTitle($pagetitle)
    {
        echo '<title>' . "Nighthawk Framework - " . $pagetitle . '</title>';
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