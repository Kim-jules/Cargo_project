<?php
session_start();

define('BASE_PATH', __DIR__);

if (!isset($_SESSION['username'])) {
    header('Location: ./views/auth/login.php');
    exit();
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']);

?>


<head>
    <title>Cargo LTD</title>
</head>

<body>
    <div class="header">
        <a href="./views/auth/logout.php">Logout</a>
    </div>
    <div class="table">
        <?php require_once './views/furniture/furnitures.php' ?>
    </div>
</body>