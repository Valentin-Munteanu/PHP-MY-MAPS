<!-- 6a Afisarea produsului intr-o pagina aparte -->

<?php
require_once "./config.php";

$productId = $_GET["id"];

$sql = "SELECT products.id, products.title, products.price, products.description, GROUP_CONCAT(product_images.url) AS image_urls 
FROM products 
LEFT JOIN product_images ON products.id = product_images.product_id 
WHERE products.id = ? 
GROUP BY products.id, products.title, products.price, products.description";



$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();

// Obținem rezultatul interogării
$result = $stmt->get_result();

// Extragem detaliile produsului ca un array asociativ
$product = $result->fetch_assoc();
// Var_dump = este o functie prin care vom verifica tipul a unei variabile
// 7a Vom face o verificare ca daca valoarea produsului este nula atunci, vom opri programul prin mesajul produs nu exista


if($product === NULL) die("Product not found");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$product["title"] ?> - Toys World</title>
</head>
<body>
    <?php
$images = explode(",", $product["image_urls"]);
foreach($images as $image) {
    echo "<img loading='lazy' src='./admin/uploads/$image' alt='Product image' height='250px'>";
}


// 27-01-2024
include_once "./header.php";
?>

<h1><?= $product["title"]?></h1>
<p><?= $product["description"]?></p>
<p><strong><?= $product["price"]?>MDL</strong></p>

<!--7b Adaugam formularul pentru cos in pagina noastra de product din index.php -->

<form action='./admin/admin.php' method='POST'>
<input type='hidden' name ='product_id' value=<?=$product["id"]?>>
<button type='submit' name='save'>Save</button>
</form>

<form action='./admin/admin.php' method='POST'>
<input type='hidden' name ='product_id' value=<?=$product["id"]?>>
<button type='submit' name='cart'>Add to cart</button>
</form>
</body>
</html>