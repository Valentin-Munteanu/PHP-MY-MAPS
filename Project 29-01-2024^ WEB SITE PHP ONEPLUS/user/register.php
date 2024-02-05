<?php
require_once "../config.php";

include_once "./header.php"


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>
    <style>
        <?php
include "../styles.css";

?>
    </style>
</head>
<body>
    <div class="login">

<h3>Create Account </h3>
</div>

<div class="form-all">

<div class="form">

<form action="./auth.php" method="POST">
    <input type="text" name="login" placeholder="Login" required>
    <br>

    <input type="email" name="email" placeholder="Email" required>
    <br>
    <input type="password" name="password" placeholder="Password" required>
    <br>
  <input type="password" name="password2" placeholder="Confirm Password" required>
<br>
    <button class="btns" type="submit" name="register">Register</button>

</form>
</div>
</div>

</body>
</html>