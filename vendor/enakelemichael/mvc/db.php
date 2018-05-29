<?php
namespace enakelemichael\mvc;
use PDO;
use PDOException;
class db
{
    // the database connection
    protected static $connection = null;
    /**
     * returns the connection to a MySQL server
     * 
     * the connection is a PDO object
     */
    public static function getConnection()
    {
        if (static::$connection === null) { // was the connection not yet established?
            try {
                static::$connection = new PDO(
                    // 'mysql:dbname=world;host=localhost;charset=utf8'
                    'mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8', 
                    DB_USER,
                    DB_PASS
                );
         
                static::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
         
        return static::$connection;
    }
    public static function exitWithError()
    {
        // print a <h1>
        echo '<h1>MySQL error:</h1>';
    
        // dump information about the error
        var_dump(static::getConnection()->errorInfo());
    
        // end execution
        exit();
    }
}