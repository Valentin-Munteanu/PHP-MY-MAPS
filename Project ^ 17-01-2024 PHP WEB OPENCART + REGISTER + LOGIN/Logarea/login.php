<?php
require_once "header.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Opencart</title>
<style>
    <?php
include "../styles.css"
    ?>
</style>
</head>
<body>
    <div class="login">
    <h3>Log in to your OpenCart account</h3>

    </div>
<br>

  
<div class="form-all">


    <div class="form">
    <br>

    <h3>Login</h3>
        <form action="./principal.php" method="POST">
        <input type="text" placeholder='Login' name="login" required>
        <br>
<h3>Password</h3>
<input type="password" placeholder="Password" name="password">
<br>

<br>
<button class="btns" type="submit" name="user_login">Login</button>


        </form>

    </div>

<div>
    
</div>

<div class="form-all1">
    <div class="form">
        <h3>Do not have an account?</h3>
        <p>Create an OpenCart account. By creating an account with our store, you will be able to download more <br> features through marketplace, uploading showcase and become Partner and Seller.</p>
    </div>

    <div class="form-3">
<img src="https://www.opencart.com/application/view/image/home/dedicated-support-icon.png" alt="">
    <p>	Looking for professional support for your project? <br>
OpenCart now offers dedicated technical support.</p>
<h4>Learn more about Dedicated Support</h4>
</div>
    </div>
    </div>

    <?php
require_once "./footer.php"
?>
</body>
</html>