<?php


namespace App\classes\Database;

use App\classes\builder\QueryBuilder;
use App\classes\Config;
use App\classes\enum\Enummode;

/**
 * Class sqlHousing
 * @package App\classes\Housing
 */
class SQLhousing implements Housingbase
{
##$config = new Config();
    /** @noinspection PhpTooManyParametersInspection
     * @param $cluescrolltype
     * @param $totalgp
     * @param $cluescrollreroll
     * @param $totalgpreroll
     * @param $rewardcasket
     * @param $tenc
     * @return string
     */
    public function sqlQuery00SC($cluescrolltype, $totalgp, $cluescrollreroll, $totalgpreroll, $rewardcasket, $tenc)
    {
        $config = new Config();
        return "INSERT INTO " . $config->getTable() . " (type, value, reroll, reroll_value,reward_casket, time) 
        VALUES ('$cluescrolltype', '$totalgp', '$cluescrollreroll' , '$totalgpreroll',$rewardcasket, $tenc)";
    }

    /**
     * @return string
     */
    public function sqlQuery00CT()
    {
        $config = new Config();
        $db_name = $config->getDatabase();
        $table_name = $config->getTable();
        return (new QueryBuilder())::select('*')
            ->from('information_schema.tables')
            ->where('table_schema = ' . "'" . $db_name . "'")
            ->where('table_name =' . "'" . $table_name . "'");
    }

    /**
     * @return string
     */
    public function sqlQuery00TE()
    {
        $config = new Config();
        return "SELECT COUNT(*) FROM information_schema.tables  
        WHERE table_schema = DATABASE() AND table_name = " . "'" . $config->getTable() . "'";
    }

    /**
     * @return string
     */
    public function sqlLogin()
    {
        return (new QueryBuilder())::select("id,username, password")
            ->from("users")
            ->where('username = ?');
    }

    /**
     * @return string
     */
    public function sqlselectUser()
    {
        return (new QueryBuilder())::select('*')
            ->from("clue")
            ->where('Reward_casket = 1');
    }

    /**
     * @return \App\classes\functions\Select
     */
    public function sqlQuery01RC()
    {
        return (new QueryBuilder())::select('*')
            ->from("clue")
            ->where('id = 1');
    }
}

?>