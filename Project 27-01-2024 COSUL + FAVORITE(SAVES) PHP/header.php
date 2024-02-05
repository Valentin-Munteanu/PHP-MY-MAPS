<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="./index.php">Toys World</a>

<nav>
<ul>
    <li><a href="./index.php">Home</a></li>
    <li><a href="./saves.php">Saves</a></li>
    <li><a href="./cart.php">Cart</a></li>

    <!-- 1b 27-01-2024 -->
    <?php
if(isset($_SESSION["user_id"])){ 
?>
    <li><a href="./user/account.php">Account</a></li>

<?php }else { ?>
    <li><a href="./user/login.php">Login</a></li>

<?php }

?>
   
</ul>
<a href="./Admin/products.php">Products</a>
<a href="./index.php">Home</a>
        <a href="./Admin/create.php">Add</a>
        <a href="./update.php">Edit</a>
        <a href="./delete.php">Delete</a>
    </nav>
    </header>
</body>
</html>