<?php


define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'cargo_db');

class Database
{
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli(HOST, USER, PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die('Failed to connect' . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
