<?php
require_once "../config.php";
require_once "header.php";

// VOM CREEA O MODALITATE IN CARE VOM PREVENI INTRAREA UNUI CLIENT OBISNUIT PE PAGINA DE admin 
// 27 Verificam daca user_id este setat, setAdmin din session user_id in sesiune, si nu este setat in functia de checkAdmin din sesiune , Noi am adaugat verificarea in functia noastra, prin aceasta metoda verificam daca user_id exista in functia noastra, In acest caz vom face o retremitere pe pagina de account.php

// 27a In caz contrar daca valoarea de user_id nu va exista vom returna inapoi pe pagina de login.php



if (isset($_SESSION["user_id"]) && !checkAdmin($_SESSION["user_id"])) {
    header("Location: ../user/account.php");
} else if (!isset($_SESSION["user_id"])) {
    header("Location: ../user/login.php");
}



$stmt = $conn -> prepare("SELECT * FROM products");
$stmt -> execute();
$result = $stmt -> get_result();

// 20-01-2024 
// 40 Creem un 

$products = [];

while ($row = $result -> fetch_assoc()) {
    $products[] = $row;
}


// 

// 


// 28 Primim valorile DIN TABEL DUPA CARE LE AFISAM la ecran, selectand totul din tabelul de products, prin execute executam comanda de mai sus, iar prin get_result vom primi rezultatele la ecran ///// Aceiasi chestie am facuto la create, etc PASUL 1 




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 29 CREEM UN FORMULAR IN CARE VOM ACTUALIZA PRODUSUL CREEAT (CREATE => PRODUCT => UPDATE) -->
<!-- Trimitem actiunea in fisierul de admin.php prin metoda de POST -->
<!-- Afisam PRODUSUL ACTUALIZAT PRIN WHILE ATAT CAR $row = $result -> vom primi datele sub forma unui tablou asociativ, in care prin echo vom afisa produsul la ecran, sub forma de elementul HTML option value -->

    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="./admin.php" method="POST">
    <select name="product_id">

    <?php

 foreach ($products as $product) {
     echo "<option value='$product[id]'>$product[title]</option>";
 }
?>
    </select>
<!-- 30 Creem inputuri si formularul pentru update(edit) -->

<input type="text" name="title" placeholder="Title" required>
        <textarea name="description" id="" cols="30" rows="5" placeholder="Description"></textarea>
        <input type="number" name="price" placeholder="Price" required step="0.01">
        <button type="submit" name="update">Edit product</button>
<!--  -->
<hr>
<!-- hr= Linie dreapta -->
<h1>Edit product images</h1>
    <form action="./admin.php" method="POST" enctype="multipart/form-data">
        <select name="product_id">
            <?php
                foreach ($products as $product) {
                    echo "<option value='$product[id]'>$product[title]</option>";
                }

    ?>
    </select>
<label for="images">Images:</label>
<!--  -->
        <input type="file" name="images[]" id="images" multiple accept="image/webp">
        <!-- Formatul de webp sunt imagini care se descarca mai rapid -->
<!-- Multipart va fi atributul care va accepta imaginile noastre, este atributul special care accepta fisiere -->
<button type="submit" name="create">Add</button>

<!--  -->
    </form>
</body>
</html>