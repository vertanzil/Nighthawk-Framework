<?php

namespace App\classes\functions;

use ReflectionClass;

/**
 * Class enumCheck
 * @package App\classes
 */
abstract class Enumcheck
{

    private static $constCacheArray = NULL;

    /**
     * @param $name
     * @param bool $strict
     * @return bool
     */
    public static function isValidName($name, $strict = false)
    {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    /**
     * @return mixed
     */
    public static function getConstants()
    {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new ReflectionClass($calledClass);
            if (isset($reflect)) {
                self::$constCacheArray[$calledClass] = $reflect->getConstants();
            }
        }
        return self::$constCacheArray[$calledClass];
    }

    /**
     * @param $value
     * @param bool $strict
     * @return bool
     */
    public static function isValidValue($value, $strict = true)
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }


}