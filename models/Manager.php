<?php

class Manager
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addManager($username, $password)
    {
        $sql = "INSERT INTO managers (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param('ss', $username, $hashed_password);
        return $stmt->execute();
    }

    public function getManagerByUsername($username)
    {
        $sql = "SELECT * FROM managers WHERE username=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
