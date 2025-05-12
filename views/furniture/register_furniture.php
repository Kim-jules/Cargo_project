<?php

require_once '../../controllers/FurnitureController.php';
require_once('../../config/database.php');
require_once('../../models/Furniture.php');

$db = (new Database())->connect();
$furniture = new FurnitureController($db);
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $owner = $_POST['owner'];

    if (!empty($_POST['name']) && !empty($_POST['owner'])) {
        $msg = $furniture->registerFurniture($name, $owner);

        if ($msg) {
            header('Location: ../../index.php');
            exit;
        } else {
            echo 'Failed to add Furniture';
        }
    }
}

?>

<body>
    <div class="form">
        <p><?php echo $msg ? $msg : ''; ?></p>
        <div class="header">
            Add Furniture
        </div>
        <form action="" method="post">
            <input type="text" placeholder="Enter furniture name" name="name">
            <input type="text" placeholder="Enter owner" name="owner">
            <input type="submit" value="Add product">

        </form>
    </div>
</body>