<?php

namespace App\classes\Database;
/**
 * Interface housingBase
 * @package App\classes\Housing
 */
interface Housingbase
{
    /** @noinspection PhpTooManyParametersInspection */
    /**
     * @param $cluescrolltype
     * @param $totalgp
     * @param $cluescrollreroll
     * @param $totalgpreroll
     * @param $rewardcasket
     * @param $tenc
     * @return mixed
     */
    public function sqlQuery00SC($cluescrolltype, $totalgp, $cluescrollreroll, $totalgpreroll, $rewardcasket, $tenc);

    public function sqlQuery00CT();

    public function sqlQuery00TE();


}

?>