<!-- 10 INPORAM OBLIGATORIU DOCUMENTUL DE config.php pentru interactionarea cu baza de date -->

<?php
require_once "config.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    <?php
    include "./styles.css"
    ?>
</style>

<script defer src="./scrips.js"></script>
    <title>Main Page</title>
</head>
<body>

<!-- 11 In divul de slider vom adauga fiecare imagine pe care am salvato in tabelul de slides, SELECTAM TOATA INFORMATIA DIN TABELUL DE slides -->
<!-- 11a Creem interogara $conn -query - $sql = $results -->

<!--11b Creem o variabila de $sql in care vom selecta totul din tabelul nostru de slides, apoi creem interogarea unde $conn -> query($sql) = $results , Verificam numarul de randuri daca este mai mare decat 0 , unde randul va fi egal cu $result in acest caz prin fetch_assoc vom afisa datele noastre din tablou sub forma de coloana la ecran prin echo , INFORMATIE MAI MULTA cms.php LINI 8A  -->


<!-- ATENTIE LUCRU DE BAZA A PHP ACESTA INFORMATIE ESTE TRIMISA PRIN SERVER -> APOI NOI O PRIMIM INAPOI PRIN ELEMENTE DE HTML AFISINDULE LA ECRAN(echo) -> APOI PUTEM ACEASTA INFORMATIE SA O MODIFICAM (CSS, JS) -->
<div id="slider-wrapper">
    <div id="slider">
        <?php
$sql = "SELECT * FROM slides";
$results = $conn -> query($sql);
if($results -> num_rows > 0 ) {
    while($row = $results -> fetch_assoc()) {
        echo "
        <a class = 'slide' href = './product.php?id=$row[product_id]'>
        <img src ='$row[url]' alt= 'Slide image'>
       </a> ";
    }
}
        ?>
        </div>
    </div>

    <button id="left">&larr;</button>
    <button id="right">&rarr;</button>
    
</body>
</html>