<?php

require_once('./controllers/FurnitureController.php');
require_once('./config/database.php');
require_once('./models/Furniture.php');

$db = (new Database())->connect();
$furnitureController = new FurnitureController($db);
$furnitures = $furnitureController->getAllFurnitures();

?>

<body>
    <div class="container">
        <div class="header">
            <h1>All Furnitures</h1>
            <div class="addFurniture">
                <button>
                    <a href="./views/furniture/register_furniture.php">Add Furniture</a>
                </button>
            </div>
        </div>
        <div class="table">
            <table border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Furniture Name</th>
                        <th>Owner</th>
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($furnitures)): ?>
                        <?php foreach ($furnitures as $furniture): ?>
                            <tr>
                                <td><?= $furniture['furniture_id']; ?></td>
                                <td><?= $furniture['furniture_name']; ?></td>
                                <td><?= $furniture['owner']; ?></td>
                                <td>
                                    <a href="../import/import.php/?id=<?= $furniture['furniture_id'] ?>">Import</a>
                                    <a href="../export/export.php/?id=<?= $furniture['furniture_id'] ?>">Export</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <td colspan="4">
                            Not Furniture in the DB.
                        </td>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>