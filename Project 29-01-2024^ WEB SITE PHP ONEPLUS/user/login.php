<?php
require_once "../config.php";

include_once "./header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
        <?php
include "../styles.css";
        ?>
    </style>
</head>
<body>
    <div class="login">
<h3>Sign in for you Account</h3>
</div>

<div class="form-all">
<div class="form">
    <form action="./auth.php" method="POST">
<input type="text" name="login" placeholder="Login" required>
<br>
<input type="password" name="password" placeholder="Password" required>
<br>
<button class="btns" type="submit" name="lor">Sign in</button>

    </form>
    </div>
</div>
    <a class="btns" href="./register.php">Register Acount</a>


</body>
</html>