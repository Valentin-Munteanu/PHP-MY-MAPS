<!-- Cosul de cumparaturi -->

<?php
require_once "./config.php";

if(!isset($_SESSION["user_id"])){
    header("Location: ./admin/login.php");

}
//  ???? ??  ?? ?  ? ?
$userId = $_SESSION["user_id"];
// Selectam tot din tabelul de cart unde vom face conectiunea intre cart + phones + images

// Alegem toate campurile, unde concatinma url din tabelul de imagini cu image_urls, 
// Selectam elementele comune din tabelul de phones, unde cheia primara de phones.id = va fi egala cu cheia secundara din tabelul de cart.phone_id = CHEIA PRIMARA + CHEIA SECUNDARA conectam tabelul de cart cu tabelul de phones 

// 

$sql = "SELECT cartPhone.*, 
                phones.id AS phone_id, 
                phones.title, 
                phones.price, 
                phones.description, 
                GROUP_CONCAT(imagesP.url) AS image_urls 
        FROM cartPhone 
        INNER JOIN phones ON phones.id = cartPhone.phone_id 
        LEFT JOIN imagesP ON phones.id = imagesP.img_id AND cartPhone.user_id = ? 
        GROUP BY cartPhone.id, phones.id, phones.title, phones.price, phones.description";


$stmt = $conn -> prepare($sql);
$stmt-> bind_param("i", $userId);
$stmt -> execute();
$result = $stmt -> get_result();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosul de cumparaturi</title>
</head>
<body>
    <?php
   include_once "./header.php";
    ?>
    <div class="login">
        <h3>Cosul de Cumparaturi</h3>
        <br>
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        
    </div>
    <br>

        
        <div class="product-info">
    <div class="product">
    <?php
while($product = $result->fetch_assoc()){
    $image = explode(",", $product["image_urls"])[0];
    $total = $product["quantity"] * $product["price"];
echo "

    <img loading='lazy' src='./Admin/phoner/$image' alt='Product_Image' height=250px>
    <br>
    <div class='text'>


    <h2>$product[title]</h2>
    <h3>$product[description]</h3>
    <p> $product[price] MDL</p>
    <a class='btn' href='productP.php?id=$product[phone_id]'><button>Vezi Produsul</button></a>
    


    <br>
    <form action='./admin/admin.php' method='POST'>
    <input type='hidden' name='phone_id' value='$product[phone_id]'>
    <button class='btns' type='submit' name='delete-cart'>Sterge din Cos</button>

    
    
    </form>
    <div class = 'plus'>
    <form action='./admin/admin.php' method='POST'>
    <input type='hidden' name='phone_id' value='$product[phone_id]'>
    <input type='hidden' name='type' value='minus'>
    <button class='left'  type='submit' name='quantity-cart'>-</button>
    
</form>


<h2>$product[quantity]</h2>
<form action='./admin/admin.php' method='POST'>
<input type='hidden' name='phone_id' value='$product[phone_id]'>
<input type='hidden' name='type' value='plus'>
<button class='left' type='submit' name='quantity-cart'>+</button>

</div>
</form>
<p><strong>$product[quantity] x $product[price] MDL</strong> = $total MDL</p>
</div>
                "; 
            } 
            ?>
    </div>
        </div>
</body>
</html>