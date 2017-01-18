<?php

namespace Core;

use PDO;
use App\Config;

// Base model
class Model
{
    
    /**
     * PDO connection
     * @var object
     */
    private static $connection = null;

    /**
     * Available types for PDO binding
     * @var array
     */
    private $bindingTypes = ['i', 'd', 's'];

    public static function instance()
    {
        if (self::$connection === null) {
            self::$connection = new self();
        }

        return self::$connection;
    }

    /**
     * Get the PDO database connection
     *
     * @return void
     */
    private static function connect()
    {
        if ($this->connection) {
            return $this->connection;
        }

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8',
            Config::DB_HOST,
            Config::DB_NAME
        );

        $this->connection = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

        // Throw an Exception when an error occurs
        $this->connection->setAttribute(
                PDO::ATTR_ERRMODE, 
                PDO::ERRMODE_EXCEPTION
        );
    }

    /**
     * Close the PDO database connection
     * 
     * @return void
     */
    private static function disconnect()
    {
        if ($this->connection === null) {
            return;
        }

        mysqli_close($this->connection);
        $this->connection = null;
    }

    /**
     * Gets the parameter passed to the statement as a binding string of types
     * 
     * @return string
     */
    private static function getBindingTypes($params)
    {
        $str = '';

        foreach ($params as $param) {
            $type = gettype($param);

            if (!in_array($type[0], $this->bindingTypes)) {
                throw new Exception("Unknown type: " . $type[0]);
            }

            $str .= $type[0];
        }

        return $str;
    }

    /**
     * SELECT statement, which returns rows
     * 
     * @return array
     */
    private static function select($sql, $params)
    {
        $types = $this->getBindingTypes($params);

        
    }

    // INSERT, UPDATE, DELETE
}
