<?php

namespace App\classes;

use App\classes\functions\Functions;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;


/**
 * Interface ConfigStub
 * @package App\classes
 */
interface ConfigStub
{

    public function getHost();

    public function getUsername();

    public function getDatabase();

    public function getPassword();

    public function getTable();
}

/**
 * Interface ConfigStub
 * @package App\classes
 */

/**
 * Class Config
 * @package App\classes
 */
class Config implements ConfigStub
{

    /**
     * @return mixed|null
     */
    public function getHost()
    {
        return self::retrieveSetting("host");
    }

    /**
     * @param $fetch
     * @return mixed|null
     * Retrieves settings.
     */
    public function retrieveSetting($fetch)
    {
        $Functions = new Functions();
        if ($Functions->configExist() == true) {
            $string = file_get_contents('config.json');
            $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($string, FALSE)),
                RecursiveIteratorIterator::SELF_FIRST);
            foreach ($jsonIterator as $thekey => $theval) {
                if (!is_array($theval) && $thekey == $fetch) {
                    return $theval;
                }
            }
        }
    }

    /**
     * @return mixed|null
     */
    public function getUsername()
    {
        return self::retrieveSetting("username");
    }

    /**
     * @return mixed|null
     */
    public function getPassword()
    {
        return self::retrieveSetting("password");
    }

    /**
     * @return mixed|null
     */
    public function getDatabase()
    {
        return self::retrieveSetting("database_name");
    }

    /**
     * @return mixed|null
     */
    public function getTable()
    {
        return self::retrieveSetting("table_name");
    }

    /**
     * @return mixed|null
     */
    public function recoveryEmail()
    {
        return self::retrieveSetting("recovery_email");
    }

    /**
     * @return mixed|null
     */
    public function debugMode()
    {
        return self::retrieveSetting("debug_mode");
    }

    /**
     * @return mixed|null
     */
    public function rareCap()
    {
        return self::retrieveSetting("clue_cap");
    }
}