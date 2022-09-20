<?php
// define('SERVER_PATH', $_SERVER['SERVER_NAME']);
class DbConnection
{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'pollihaat';

    private static $instance = null;
    public $connection;

    private function __construct()
    {

        if (!isset($this->connection)) {
            //   echo "DS";
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }

        return $this->connection;
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }
    public function getConnection()
    {
        return $this->connection;
    }

}