<?php
    require_once "../config.php";

    if (isset($_SESSION["user_id"]) && !checkAdmin($_SESSION["user_id"])) {
        header("Location: ../user/account.php");
    } else if (!isset($_SESSION["user_id"])) {
        header("Location: ../user/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <nav>
        <a href="./products.php">Products</a>
        <a href="./create.php">Add</a>
        <a href="./update.php">Edit</a>
        <a href="./delete.php">Delete</a>
    </nav>
</body>
</html>