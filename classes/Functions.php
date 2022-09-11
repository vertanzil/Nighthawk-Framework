<?php

namespace App\classes;

use App\classes\Database\Database;
use App\classes\Database\SQLhousing;
use DivisionByZeroError;
use http\Exception;


/**
 * Class Functions
 * @package App\classes
 */
class Functions
{
    /**
     * @return boolean
     */
    static function checkTable()
    {
        $db = Database::getInstance();
        $housing = new SQLhousing();
        $mysqli = $db->getConnection();
        $result = $mysqli->query($housing->sqlQuery00CT();
        return mysqli_fetch_row($result);
    }

    /**
     * @param $string
     * @return bool
     */
    function charcCheck($string)
    {
        return preg_match('/[\'^£$%&*()}{@#~?><,|=_+¬-]/', $string) ? true : false;
    }

    /**
     * @param $file
     * @return bool
     */
    function fileExists($file)
    {
        if (!is_file($file) || self::charcCheck($file)) {
            die("Error");
        }
        $filename = dirname($file);
        $filename = str_replace(" ", "", $filename);
        return file_exists($filename) ? true : false;
    }

    /**
     * @param $a
     * @param $b
     * @return int
     */
    function cmp($a, $b)
    {
        $a = date('Y/m/d', strtotime($a));
        $b = date('Y/m/d', strtotime($b));

        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    /**
     * @param $gph
     * @param $clueTotal
     * @param $cluePH
     * @return int|null|string
     */
    function checkAverage($gph, $clueTotal, $cluePH)
    {
        if (!is_numeric($gph) || !is_numeric($clueTotal) || !is_numeric($cluePH) || self::charcCheck($clueTotal) || self::charcCheck($cluePH)) {
            die("Error");
        }
        try {
            return $gph == 0 || $clueTotal == 0 || $cluePH == 0 ? 0 : number_format(round($gph / $clueTotal));
        } catch (Exception $exception) {
            echo $exception->getMessage();
        } catch (DivisionByZeroError $exception) {
            echo $exception->getMessage();
        }
        return null;
    }

    /**
     * @param int $length
     * @param bool $add_dashes
     * @param string $available_sets
     * @return bool|string
     */
    function generatePwd($length = 9, $add_dashes = false, $available_sets = 'luds')
    {
        $sets = array();
        if (strpos($available_sets, 'l') !== false) {
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        }
        if (strpos($available_sets, 'u') !== false) {
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        }
        if (strpos($available_sets, 'd') !== false) {
            $sets[] = '23456789';
        }
        if (strpos($available_sets, 's') !== false) {
            $sets[] = '!@#$%&*?';
        }
        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $password .= $all[array_rand($all)];
            $password = str_shuffle($password);
            switch ($add_dashes) {
                case True:
                    $dash_len = floor(sqrt($length));
                    $dash_str = '';
                    while (strlen($password) > $dash_len) {
                        $dash_str .= substr($password, 0, $dash_len) . '-';
                        $password = substr($password, $dash_len);
                    }
                    $dash_str .= $password;
                    return $dash_str;
                    break;
                case False:
                    return $password;
                    break;
                default:
                    return $password;
                    break;
            }
        }
    }
}