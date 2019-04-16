<?php

namespace App\Core;

/**
 * Class ConnectionManager
 * @package App\Core
 */
class ConnectionManager
{
    private static $instance;

    /**
     * ConnectionManager constructor.
     */
    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * @return null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::connection();
        } else {
            return self::$instance;
        }
    }

    private static function connection(): void
    {
        $config = require __DIR__ . '/../conf/Configuration.php';
        $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['host'];
        try {
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false
            ];
            self::$instance = new \PDO($dsn, $config['user'], $config['password'], $options);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * @param $query
     * @param array $parameters
     * @param int $mode
     * @return bool|null
     */
    public static function executionQuery($query, $parameters = [], $mode = \PDO::FETCH_ASSOC)
    {
        try {
            $query = trim(str_replace('\r', '', $query));
            $rawStatement = explode(' ', preg_replace("/\s+|\t+|\n+/", ' ', $query));
            $statement = strtolower($rawStatement[0]);

            if ($statement === 'select') {
                $statement = self::$instance->query($query);
                return $statement->fetchAll($mode);
            }

            if ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
                $statement = self::$instance->prepare($query);
                $statement->execute($parameters);
                return true;
            }

            return null;

        } catch (\PDOException $ex) {
            exit($ex->getMessage());
        }
    }
}
