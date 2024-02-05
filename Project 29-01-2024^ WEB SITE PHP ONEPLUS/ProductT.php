<?php
require_once "./config.php";

// Verificăm dacă există un id în parametrii GET
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    die("Invalid product ID");
}

$productId = $_GET["id"];

// Interogare parametrizată pentru a selecta produsul specificat de ID-ul primit prin GET
$sql = "SELECT tablet.id,
               tablet.title,
               tablet.price,
               tablet.description,
               GROUP_CONCAT(imagesTB.url) AS image_urls
        FROM tablet
        LEFT JOIN imagesTB ON tablet.id = imagesTB.tablete_id
        WHERE tablet.hidden = 0 AND tablet.id = ?
        GROUP BY tablet.id, tablet.title, tablet.description, tablet.price";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId); // Legăm parametrul ID la interogare
$stmt->execute();
$result = $stmt->get_result();

// Verificăm dacă am obținut un rezultat
if ($result->num_rows === 0) {
    die("Product not found");
}

// Obținem detaliile produsului
$product = $result->fetch_assoc();

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

    <br>
   
    <div id="login">
        <h3><?=$product['title']?></h3>
        <br>
        <a class="btn" href="tablet.php"><button>Tablete</button></a>

        
    </div>
        
   <div class="product-info">
    <div class="product">
    <br>

    <?php
    
    // Iterăm prin toate imaginile produsului
    $images = explode(",", $product["image_urls"]);
    foreach($images as $img) {
        echo "<img loading='lazy' src='./Admin/tablet/$img' alt='Product image' height='250px'>";
    }
    ?>
    <h1><?=$product["title"]?></h1>
    <h3><?=$product["description"]?></h3>
    <p><?=$product["price"]?>MDL</p>

</div>

</body>
</html>