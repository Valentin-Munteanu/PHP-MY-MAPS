<!-- Cms = Content managment system este un document care are grija de mai multe actiuni in acelasi timp  ATENTIE !!! ORICARE SITE ARE NEVOIE DE CMS CARE TREBUIE PENTRU MODIFICAREA CONTENTULUI -->
<!-- 2 Importam obligatoriu prin require_once documentul de config.php -->

<?php
require_once "config.php";
// 3 VERIFICAM DACA METODA DE TRIMITERE A DATELOR = POST CREEM O VERIFICARE DACA NUMELE BUTONULUI DE CREARE (type) === Valoarea lui (product-create) VOM CREEA SQL Necesar pentru a putea crea un produs
// 4 Verificam daca Titlu, pretul si url va fi transmis prin metoda de POST 

// ATENTIE !!! IN PARANTEZELE ALBASTRE SUNT INSERATE CAMPURILE DE name DIN INPUTURI


if($_SERVER["REQUEST_METHOD"] === "POST") {
if($_POST["type"] === "product-create") {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $url = $_POST["url"];

    // 5 Inseram valorile si le scrim in VALUES PRIN VARIABILILE DE MAI SUS, iar headurul il trimitem pe urmatoarea adresa 

    $sql = "INSERT INTO products(title, price, url) VALUES ('$title', $price, '$url')";
  $conn -> query($sql);
  header("Location: ./cms.php");
}

// 9 Vom verifca daca numele de type a butonului = slide_create cu valoara lui Vom creea o variabila , vom crea variabila de productID = Verificand valoarea care va fi transmisa prin metoda de post din SELECTUL DE MAI JOS  ["product_id"] , SELECT = NAME REZULTA CA VALOAREA UNUI CAMP ESTE = NAME


if($_POST["type"] === "slide_create" ) {
    $productId = $_POST["product_id"];
    $url = $_POST["url"];

        // 9a Inseram valorile si le scrim in VALUES PRIN VARIABILILE DE MAI SUS, iar headurul il trimitem pe urmatoarea adresa 
    $sql = "INSERT INTO slides(url,product_id) VALUES ('$url', $productId)";
    $conn -> query($sql);
    header("Location: ./cms.php");
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CMS</title>

</head>
<body>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Title">
        <input type="number" name="price" step="0.01" placeholder="price">
        <input type="text" name="url" placeholder="URL">
        <button name="type" value="product-create">Create</button>

    </form>
    <!-- 6 Prin optiuni vom trimite o cheie primara pentru a o puteaua folosi ca o cheie secundara pentru a putea crea valoarea a unei chei secundare  -->
    <form action="" method="post">
        <select name="product_id" id="">
            <!-- 7 Creem blocul de php, SELECTAM id PRODUSUL , Titlu din tabelul care se numeste products  -->
            <!-- 8 Creem un results o interogare pentru conn + sql = $results , apoi verificam numarul de randuri, daca numarul de randuri sunt mai mari decat 0 vom creea un block de while in care row = va fi = rezults REZULTAT prin fetch assoc - Vom primi cate un rand din tabelul nostru prin urmatoarea metoda   -->

            <!-- 8a CREEM un echo in care vom scrie o optiune care va avea valoare produsului , adica $row[product_id], plus titlu produsului $row[title]   -->

            <!-- 8a ATENTIE ACESTA COMANDA A FOST CREEATA PENTRU TABELUL DE slides din baza de date MYSQL -->

            <!-- 8a 1 Creem un select in care vom selecta titlu, product_id (Cheia secundara spre tabelul de produse) 

        2 Creem o variabila $results unde vom face o interogare cu conectiunea a bazei de date a datelor care vor fi trimise prin $conn + $sql = $results .
        Rezulta ca aceasta interogare va fi transmisa in variabila de $results

        3 Verificam daca numarul de randuri este mai mare decat 0 , atunci vom creea while (atat timp cat) randul($row) va fi egal $results = adica cu rezultatul interogarii va fi transmis intr-un tablou sub forma de coloana,(fetch_assoc)

        4 In acest caz afisam prin echo randul de id a produsului si rindul de title 
        FORMULA $conn + query($sql) = $results
        $row = $results > 0 = [] + coloana = echo $row[product_id] $row[title] 
        -->
            <?php
            $sql = "SELECT product_id , title FROM products";
            $results = $conn-> query($sql);
            if($results -> num_rows > 0) {
                while($row = $results -> fetch_assoc()) {
echo "<option value = '$row[product_id]'> $row[title]</option> ";
                }
            }
        ?>

        </select>
        <!-- ATENTIE !!!  IN ACEST INPUT VOM ADAUGA ADRESA IMAGINII PENTRU SLIDER  -->
        

<!-- ATENTIE LUCRU DE BAZA A PHP ACESTA INFORMATIE ESTE TRIMISA PRIN SERVER -> APOI NOI O PRIMIM INAPOI PRIN ELEMENTE DE HTML AFISINDULE LA ECRAN(echo) -> APOI PUTEM ACEASTA INFORMATIE SA O MODIFICAM (CSS, JS) -->
        
       <input type="text" name="url" placeholder="url">
       <button name="type" value="slide_create">Create</button>
    </form>
    <div class="products"></div>
</body>
</html>