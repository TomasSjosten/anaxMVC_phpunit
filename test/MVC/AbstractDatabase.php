<?php

namespace Anax\MVC;

abstract class AbstractDatabase extends PHPUnit_Extensions_Database_TestCase
{
    private $conn = null;

    static private $pdo = null;


    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {

                self::pdo('sqlite::memory:');
                // Use if testing MySQL
                //self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, ':memory:');
            // Use if testing MySQL
            //$this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }

        return $this->conn;
    }
}