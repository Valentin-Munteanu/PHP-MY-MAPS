
<?php
include_once "../Files2/headerA.php";

require_once "../config.php";

if(!isset($_SESSION["user_id"])){
    header("Location: ./login.php");

}

$stmt = $conn -> prepare("SELECT * FROM users WHERE id = ?");
$stmt -> bind_param("i", $_SESSION["user_id"]);
$stmt -> execute();
$result = $stmt -> get_result();
$user = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <style>
        <?php
include "../styles.css";
        ?>
    </style>
</head>
<body>
    <div class="my-user">

    <div class="login">
    <h3>Account</h3>
    <br>
<h1><?= "" . $user["login"]?></h1>

<img src="https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"<?= "" . $user["login"] ?>alt="">
<h3>Welcome to Plus-Phones</h3>
  
</div>

    </div>

    <br>

    <div class="sect5-c">
    
    <div class="sect5-e">

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
    
</body>
</html>