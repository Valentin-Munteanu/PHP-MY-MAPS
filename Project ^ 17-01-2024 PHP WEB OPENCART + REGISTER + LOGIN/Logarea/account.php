<?php
require_once "../config.php";


require_once "../Files2/header-acount.php";


if(!isset($_SESSION["user_id"])) {
    header("Location: ./login.php");

}


$userE = $conn -> prepare("SELECT * FROM register WHERE id = ?");
$userE -> bind_param("i", $_SESSION["user_id"]);
$userE -> execute();
$result = $userE -> get_result();
$user = $result -> fetch_assoc();
?>


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
    <title>Document</title>
</head>
<body>

<div class="my-user">
<div class="login">
        
        <h1><?= "" . $user["login"]?></h1>
        <img src="https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"<?= "" .$user["login"] ?>alt="">
        
    <h3>Account</h3>
    <br>
    <h3>Welcome to OpenCart!</h3>

    </div>

    </div>



<!---->
 <!-- -->



 

<div class="sect5-c">
    
<div class="sect5-e">
    <div id="info">
<h3>Account</h3>

    </div>
<br>
<img src="https://www.opencart.com/application/view/image/account/icons/account_details.svg" alt="">
<br>

<h3>Account Details</h3>

<p>Edit your account details.</p>
</div>

<br>

<div class="sect5-e">
<img src="https://www.opencart.com/application/view/image/account/icons/change_password.svg" alt="">
<br>
<h3>Change Password</h3>

<p>Reset your password.</p>
</div>
</div>
<br>

<div class="sect5-c">
<div class="sect5-e">
<img src="https://www.opencart.com/application/view/image/account/icons/payment_methods.svg" alt="">
<br>
<h3>Payment Methods</h3>

<p>Modify your payment methods.</p>
</div>




<div class="sect5-e">
<img src="https://www.opencart.com/application/view/image/account/icons/showcase.svg" alt="">
<br>
<h3>Showcase</h3>

<p>Submit your store to OpenCart's showcase.</p>

</div>
</div>

<br>


<br>
<div class="sect5-c">
<div class="sect5-e">
    <div id="info">
<h3>Purchases</h3>

    </div>
    <br>

 

<img src="https://www.opencart.com/application/view/image/account/icons/your_orders.svg" alt="">

<h3>Your Orders</h3>
<p>View the extensions </p>


</div>



<div class="sect5-e">
<img src="https://www.opencart.com/application/view/image/account/icons/your_downloads.svg" alt="">

<h3>Your Downloads</h3>

<p>Your Purchased extensions.</p>

</div>
</div>
<br>

<div class="sect5-c">
<div class="sect5-e">
<img src="https://www.opencart.com/application/view/image/account/icons/your_stores.svg" alt="">

<h3>Your Stores</h3>

<p>Register and access the marketplace API.</p>


</div>


<br>

<div class="sect5-e">
<img src="https://www.opencart.com/application/view/image/account/icons/rate_your_downloads.svg" alt="">
<h3>Rate your Downloads</h3>

<p>Rate your previously downloaded extensions.</p>

</div>
</div>




<?php

require_once "../Files2/footer-acount.php";

?>



</body>
</html>