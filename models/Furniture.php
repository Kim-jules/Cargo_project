<?php

class Furniture
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function addFurniture($furniture_name, $owner)
    {
        $sql = "INSERT INTO furniture (furniture_name, owner) VALUES(?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $furniture_name, $owner);
        $stmt->execute();
    }

    public function getFurnitureById($id)
    {
        $sql = "SELECT * FROM furniture WHERE furniture_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $results = $stmt->get_results()->fetch_assoc();
        return $results;
    }

    public function getAllFurniture()
    {
        // $sql = "SELECT * FROM furniture";
        // $stmt = $this->conn->prepare($sql);
        // $stmt->execute($sql);
        // $results = $stmt->fetch_all(MYSQLI_ASSOC);
        // return $results;
        $sql = "SELECT * FROM furniture";
        $results = $this->conn->query($sql);
        if ($results && $results->num_rows > 0) {
            return $results->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function deleteFurniture($id)
    {
        $sql = "DELETE * FROM furniture WHERE furniture_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function updateFurniture($id, $furniture_name, $owner)
    {
        $sql = "UPDATE furniture SET furniture_name=?, owner=? WHERE furniture_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssi', $furniture_name, $owner, $id);
        $stmt->execute();
    }
}
