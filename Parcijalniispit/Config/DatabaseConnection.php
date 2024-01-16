<?php

require_once 'Config.php';

class DatabaseConnection
{
    private static $instance;
    private $pdo;

    private function __construct($dbConfig)
    {
        $dsn = "mysql:host={$dbConfig['host']};port={$dbConfig['port']};dbname={$dbConfig['database']};charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Database Connection Error: " . $e->getMessage());
        }
    }

    public static function getInstance($dbConfig)
    {
        if (!self::$instance) {
            self::$instance = new self($dbConfig);
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}


?>
