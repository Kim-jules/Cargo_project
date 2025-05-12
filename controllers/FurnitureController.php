<?php

// include './models/Furniture.php';

include_once __DIR__ . '/../models/Furniture.php';


class FurnitureController
{
    private $furnitureModel;

    public function __construct($conn)
    {
        $this->furnitureModel = new Furniture($conn);
    }

    public function registerFurniture($furniture_name, $furniture_owner)
    {
        $msg = '';
        $furniture = $this->furnitureModel->addFurniture($furniture_name, $furniture_owner);

        if ($furniture) {
            $msg = 'Furniture Created Successfully';
            return $msg;
        } else {
            $msg = "Failed to create the furniture";
            return $msg;
        }
    }

    public function getFurniture($id)
    {
        $furnitureById = $this->furnitureModel->getFurnitureById($id);
        return $furnitureById;
    }

    public function getAllFurnitures()
    {
        $allFurnitures = $this->furnitureModel->getAllFurniture();
        return $allFurnitures;
    }

    public function deleteFurniture($id)
    {
        $this->furnitureModel->deleteFurniture($id);
    }

    public function updateFurniture($id, $furnitureName, $furnitureOwner)
    {
        $results = $this->furnitureModel->updateFurniture($id, $furnitureName, $furnitureOwner);
        return $results;
    }
}
