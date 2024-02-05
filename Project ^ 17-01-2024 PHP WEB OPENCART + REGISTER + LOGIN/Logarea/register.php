<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php
include "../styles.css"
        ?>
    </style>
<?php
require_once "header.php";

?>



    <title>Document</title>
</head>
<body>
<div class="login">
    <h3>Register to OpenCart </h3>

    </div>
<br>

<div class="form-all">


    <div class="form">

  
    <h3>Register for OpenCart acoount</h3>
    <form action="./principal.php" method="POST">
        <h3>Username</h3>
    <input type="text" name="login" placeholder="Username" required>

    <br>

        <h3>First Name</h3>
<br>        
    <input type="text" name="first_name" placeholder="First Name" required>
    <br>
    <h3>Last Name</h3>
<br>
<input type="text" name="last_name" required placeholder="Last Name">
<br>

<h3>E-mail</h3>

        <input type="email" name="email" placeholder="Email" required>
<br>
<h3>Country</h3>
        <select class="select" name="" id="">
        <option value="">Moldova</option>
        <option value="">Russia</option>
        <option value="">România</option>
        <option value="">Franța</option>
        <option value="">Statele Unite ale Americii</option>
        <option value="">Japonia</option>
        <option value="">Brazilia</option>
        <option value="">India</option>
        <option value="">Australia</option>
        <option value="">Canada</option>
        <option value="">Germania</option>
<option value="">China</option>
        </select>


<br>

<h3>Password</h3>
        <input type="password" name="password" placeholder="Password" required>
    
       
    <br>
<br>
        <button class="btns" type="submit" name="register">Register Opencart</button>
        
    </form>

    </div>
    <div class="form">
        <h3>Why join OpenCart.com?</h3>
        <p>You will be in good hands. More than 350 000+ live stores</p>
        <p>You will have access to 13 000+ Modules and themes in the OpenCart Marketplace.</p> <br>
        <p>Post questions to the OpenCart Community forum where we have more than 110 000 registered <br> members</p>
<br>
        <p>Get a free subscription to our newsletter</p>
        <br>
<p>You can apply for an OpenCart Developer account here.</p>
    </div>
    </div>
    <?php

    ?>

<?php
require_once "./footer.php"
?>
</body>
</html>