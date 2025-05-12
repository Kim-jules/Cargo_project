<?php
require_once '../../config/database.php';
require_once '../../controllers/ManagerController.php';

$conn = (new Database())->connect();
$controller = new ManagerController($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $msg = $controller->login($_POST['username'], $_POST['password']);
}

?>

<body>
    <div class="container">
        <div class="msg"><?= isset($msg) ? $msg : '' ?></div>
        <div class="header">Login</div>
        <div class="form">
            <form action="" method="post">
                <input type="text" name="username" placeholder="Enter username">
                <input type="password" name="password" placeholder="Enter password">
                <input type="submit" value="Login">
            </form>
            <div class="link">
                <a href="./register.php">Don't have an account? Create new account.</a>
            </div>
        </div>
    </div>
</body>