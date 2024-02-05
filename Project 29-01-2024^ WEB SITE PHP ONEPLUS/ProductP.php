<?php
require_once "./config.php";

$productId = $_GET["id"];

// Afisam produsul in pagina aparte;

 $sql = "SELECT phones.id,
       phones.title,
       phones.price,
       phones.description,
       GROUP_CONCAT(imagesP.url) AS image_urls
FROM phones
LEFT JOIN imagesP ON phones.id = imagesP.img_id
WHERE phones.id = ?
GROUP BY phones.id, phones.title, phones.description, phones.price
";


$stmt = $conn -> prepare($sql);
$stmt -> bind_param("i", $productId);
$stmt->execute();
$result = $stmt -> get_result();

$product = $result -> fetch_assoc();

if($product === NULL) die("Product not found");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$product["title"]?> - Plus Phones</title>
</head>
<body>
<?PHP
include_once "./header.php";
    ?>
    <div id="login">
        <h3><?=$product['title']?></h3>
        
    </div>
    <br>
    
   <div class="product-info">
    <div class="product">


    <?php
    $image = explode(",", $product["image_urls"]);
    foreach($image as $img){
        echo "
        <img loading='lazy' src='./Admin/phoner/$img' alt='Product image' height='250px'>
        ";
    }
    

    ?>

    <h1><?=$product["title"]?></h1>
    <h3><?=$product["description"]?></h3>
    <p><?=$product["price"]?>MDL</p>

   </div>

    <!-- Adaugam formularul pentru cart si save sau favorite in productPhones asemenea formular am adaugat la pagina de phones  -->


    <form action="./admin/admin.php" method="POST">
<input type="hidden" name="phone_id" value=<?=$product["id"]?>>
<button class="btns" type="submit" name="save">Adauga la favorite</button>

    </form>

    <form action="./admin/admin.php" method="POST">
        <input type="hidden" name="phone_id" value=<?=$product["id"]?>>
        <button class="btns" type="submit" name="cart">Adauga in cos</button>
    </form>
    </div>
    </div>
</body>
</html>