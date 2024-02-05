<?php
require_once "./config.php";
require_once "./header.php";
// Catalog
// 5a Facem verificarea pentru a putea primi product_id + images din baza  de date sql, Creem verificarile pentru a primi valori din catalog 
// LAZY LOADING = ESTE O METODA PRIN CARE IMAGINILE SE VOR INCARCA TREPTAT LA NOI PE WEBSITE,// Imaginile pot afecta la incarcarea websiteul, si la viteza acestuia, De obicei prin acesarea imaginilor ele se vor descarca la noi pe calcultor,rezulta ca Avem nevoie de functional pentru a folosi imaginile de care avem noi nevoie//
// 

// Group By vom putea grupa produsele impreuna, pentru a afisa la ecran mai multe produse


$sqlCatalog = "SELECT 
products.id,
products.title,
products.price,
GROUP_CONCAT(product_images.url) AS image_urls
FROM products

LEFT JOIN
product_images ON products.id = product_images.product_id
WHERE products.hidden = 0 GROUP BY products.id, products.title, products.price";
$stmtCatalog = $conn ->prepare($sqlCatalog);
$stmtCatalog -> execute();
$resultCatalog = $stmtCatalog -> get_result();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home- Toys World</title>
</head>
<body>
    <!-- 4a Vom crea urmatarorele chestii importante pentru proiectul nostru -->
    <!-- Avem nevoie de urmatoarele elemente pentru proiectul nostru -->
    <!-- Slider -->
    <!-- Filtrarea -->
    <!-- Sortarea -->
    <!-- Cautarea -->
    <!-- Categorizare -->
    <!-- Formular de contact -->
    <!-- Catalog [26-01-2024] -->

    <!-- 5a Vom face un funcrional prin care vom putea primi fiecare produs si imagine in ordinea crescatoare si pe rand in catalogul nostru prin metoda de lazyloading
-->
<!-- explode = este o functie care va schimba textul in tablou, Rezulta ca din linkul imaginii, o vom transforma intr-o imagine care ulterior o vom afisa la ecran, prin [0], va  rezulta ca toate imaginile noastre au fost transformate intr-un tablou, si 0 va fi prima imagine pe care o vom afisa la ecran, acest produs va avea o imagine -->
    <div class="catalog">
<?php

// Vom face o adresa prin care vom putea primi produsul nostru intr-o pagina separata prin metoda de get in pagina de product 

while($product = $resultCatalog -> fetch_assoc()) {
    $image = explode(",", $product["image_urls"])[0];
        echo "
        <div>
<img loading='lazy' src='./admin/uploads/$image' alt='Product_Image' height=250px>
<h2>$product[title]</h2>
<p><strong>$product[price] MDL</strong></p>
<a href='product.php?id=$product[id]'>See product</a>

        </div>
        ";
    
}
?>
    </div>
    
</body>
</html>