<?php

namespace App\classes\functions;

/**
 * Class Date
 * @package App\classes\functions
 */
class Date
{
    private $date;

    /**
     * Date constructor.
     * @param $date
     */
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
     * @return false|string
     */
    public function getCurrent()
    {
        $date = date("Y/m/d");
        return $date;
    }

    /**
     *
     */
    public function getPreviousMonth()
    {
        return $prevmonth = date('Y/m/d', strtotime('-1 months'));
    }


    /**
     *
     */
    public function getPreviousYear()
    {
        echo $prevmonth = date('Y/m/d', strtotime('-1 year'));
    }

    public function getLastsixMonths()
    {
        for ($i = 1; $i < 6; $i++) {
            echo date('Y/m/d', strtotime("-$i month"));
        }
    }
}