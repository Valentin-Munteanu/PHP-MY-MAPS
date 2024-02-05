<!-- Creem pagina de favorite -->

<?php
// Facem in favorite verificarea daca exista utilizatorul nostru


require_once "./config.php";

if(!isset($_SESSION["user_id"])){
    header("Location: ./admin/login.php");
    exit();

}

$userId = $_SESSION["user_id"];
// Concatimam imaginile + produsele totul in tabelulul de saves adica vom adauga toate produsele noastre la favorite



$sql = "SELECT savesPhone.*, 
                phones.id AS phone_id, 
                phones.title, 
                phones.price, 
                phones.description, 
                GROUP_CONCAT(imagesP.url) AS image_urls 
        FROM savesPhone 
        INNER JOIN phones ON phones.id = savesPhone.phone_id 
        LEFT JOIN imagesP ON phones.id = imagesP.img_id AND savesPhone.user_id = ? 
        GROUP BY savesPhone.id, phones.id, phones.title, phones.price, phones.description";


$stmt = $conn -> prepare($sql);
$stmt-> bind_param("i", $userId);
$stmt -> execute();
$result = $stmt -> get_result();







?>


<!-- Vom adauga formularul identic ca la phones.php, vom schimba in loc de adauga la favorite, sterge din favorite -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Plus Phones</title>

</head>
<body>
    <?php
include_once "./headerA.php";
    ?>
<div class="login">
    <h3>Produsele Favorite</h3>
    <br>
    <a href="favorites.php"><i class="fa-solid fa-heart"></i></a>

</div>

    <br>

        
        <div class="product-info">
    <div class="product">


    <?php
        while($product = $result -> fetch_assoc()){
            $image = explode(",", $product["image_urls"])[0];
            echo"
        
<img loading='lazy' src='../Admin/phoner/$image' alt='Product_Image' height=250px>
<br>
<div class='text'>
<h2>$product[title]</h2>
<h3>$product[description]</h3>
<p>$product[price] MDL</p>
<a class='btns' href='productP.php?id=$product[phone_id]'><button>Vezi Produsul</button></a>
<br>
<form action='./admin/admin.php' method='POST'>
<input type='hidden' name='phone_id' value='$product[phone_id]'>
<button class='btns' type='submit' name='cart'>Adauga in cos</button>
</form>
<br>


<form action='./admin/admin.php' method='POST'>
<input type='hidden' name='phone_id' value='$product[phone_id]'>
<button class='btns' type='submit' name='delete-save'>Sterge din favorite</button>
<br>

</form>



            </div>
            "; 
        } 
  


?>
        </div>

        
</div>
</body>
</html>