<?php
require_once "./config.php";
include_once "./header.php";

// Afisarea imaginilor de phones + product phones prin metoda de afisare a imaginilor Lazy loading care va afisa imaginile treptat la noi pe website

// Creem o interogare in care vom face o variabila care va raspunde de aceasta interogare, 
// Selectam din tabelul nostru de phones campurile de titlu,pret,si id si prin paramtru Group concat vom face aceste randuri sa fie unice, si le vom uni unul cu altul ,
// Prin left Join selectam din tabelul de imagsP id produselor noastre din tabelul de phones, unde produsele nu vor fi ascunse hidden = 0 , Vom face o grupare intr-e campuri, Preparam conectiunea,executam,afisam rezultatul



$sqlPhones = "SELECT audio.id,
audio.title,
audio.price,
audio.description,
GROUP_CONCAT(imagesAD.url) AS image_urls
FROM audio

LEFT JOIN
imagesAD ON audio.id = imagesAD.audios_id
WHERE audio.hidden = 0 GROUP BY audio.id, audio.title,audio.description,audio.price

";

$stmtPhones = $conn ->prepare($sqlPhones);
$stmtPhones -> execute();
$resultPhones = $stmtPhones -> get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio</title>
    <script defer src="./SliderJs/slider3.js"></script>
</head>
<body>
<div id="slider2">
    <button id="left2">&larr;</button>
    <button id="right2">&rarr;</button>
    </div>
    <!-- Afisam produsele la ecran prin while atat timp cat produsui va fi egal cu variabila de $resultPhones vom afisa elementele prin fetch_assoc,  -->
    <br>
    <div class="phones">
        <br>
        <?php
while ($product = $resultPhones->fetch_assoc()) {
    $images = explode(",", $product["image_urls"]); // Separă lista de URL-uri într-un array de imagini
    
    echo "
    <br>
            <img loading='lazy' src='./Admin/audio/$images[0]' alt='Product_Image' height=250px>
            <br>
            <div class= 'text'>
            <h2>$product[title]</h2>
            <h3>$product[description]</h3>
            <p><strong>$product[price] MDL</strong></p>
            <a class='btn' href='productA.php?id=$product[id]'><button>Vezi Produsul</button></a>
            <br>
</div>
        
    ";
}
        ?>
        
    </div>
</body>
</html>