<?php
namespace App\Installation;

use App\classes\Config;
use App\classes\Database\Database;

/**
 * Class Installation
 * @package App\Installation
 */
class Installation
{
    public function firstRun()
    {
        $config = new Config();
        $database = Database::getInstance();
        if ($database->getConnection()) {
            $sqlquery = "select count(*) from " . $config->getDatabase() . "." . $config->getTable();
            $mysqli = $database->getConnection();
            $result = $mysqli->query($sqlquery);
            $rowres = mysqli_fetch_row($result);
            if ($rowres[0] < 1) {
                $defaultpass = '$2y$10$APZXK93SiFZjudn0cEXmaOd2VwNgzGxEevYm.0UQnnzbiTp9hcsqe';
                $query1 = "CREATE TABLE `clue` (`id` INT(200) NOT NULL AUTO_INCREMENT,`type` VARCHAR(255) DEFAULT NULL,`value` INT(65) DEFAULT NULL,`reroll` INT(2) DEFAULT NULL,`reroll_value` INT(65) DEFAULT NULL `master_clue` INT(2) DEFAULT NULL,`reward_casket` INT(2) DEFAULT NULL,`time` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,  `note` VARCHAR(255) DEFAULT NULL,PRIMARY KEY (`id`)) ENGINE=InnoDB AUTO_INCREMENT=3741 DEFAULT CHARSET=latin1;";
                $query2 = "CREATE TABLE `users` (`id` int(11) NOT NULL AUTO_INCREMENT,`username` varchar(50) NOT NULL,`password` varchar(255) NOT NULL,`created_at` datetime DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY (`id`),UNIQUE KEY `username` (`username`)) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;";
                $query3 = "INSERT INTO users (username, password) VALUES ('admin','" . $defaultpass . "')";
                if ($mysqli->query($query1)) {
                    echo "Creating Clue Database" . '</br>';
                    if ($mysqli->query($query2)) {
                        echo "Creating User Database" . '</br>';
                        if ($mysqli->query($query3)) {
                            echo "Setting up default user" . '</br>';
                        } else {
                            echo "Error setting up default user, please check your connection." . '</br>';
                        }
                    } else {
                        echo "Error creating User Database, please check your connection." . '</br>';
                    }
                } else {
                    echo "Error creating clue Database, please check your connection." . '</br>';
                }
            } else {
                echo "Database is set up" . '</br>';
            }
        } else {
            header("Location: index.php?url=Error&Result=SQLError");
            die("SQL connection error");
        }
    }
}