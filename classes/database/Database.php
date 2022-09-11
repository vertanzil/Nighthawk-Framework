<?php

namespace App\classes\Database;

use App\classes\Config;
use App\classes\ErrorLogging\FileLogger;
use App\classes\functions\Functions;
use Exception;
use mysqli;

require_once(__DIR__ . "/../config/Config.php");

/**
 * Class Database
 * @package App\classes
 */
class Database
{
    private $_connection;
    private static $_instance; //The single instance

    /**
     * @return Database
     */
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Database constructor.
     */
    private function __construct()
    {
        $log = new FileLogger("./logs/Nighthawk.log");
        try {
            $configuration = new Config();
            $this->_connection = new mysqli($configuration->getHost(), $configuration->getUsername(),
                $configuration->getPassword(), $configuration->getDatabase());
            if (mysqli_connect_error()) {
                throw new Exception("Error unable to connect to database.");
            }
        } catch (Exception $e) {
            $log->log("Unable to load Javascript file" . " " . $file, FileLogger::ERROR);
            echo 'Message: ' . $e->getMessage();
            header("Location: ?url=Error&Errno=101");
        }
    }

    /**
     * @param mysqli $connection
     * @return Database
     */
    public function setConnection($connection)
    {
        $this->_connection = $connection;
        return $this;
    }

    private function __clone()
    {
        $this->_connection->close();
    }

    /**
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->_connection;
    }


}