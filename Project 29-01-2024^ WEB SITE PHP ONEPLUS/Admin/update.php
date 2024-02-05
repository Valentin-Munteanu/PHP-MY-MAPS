<?php
require_once "../config.php";
require_once "../header.php";





// Creem si adaugam tot din tabelul nostru de phones, prin varibiala de $stmt care va fi egala cu connectiunea 
// Executam comanda, creem mai jos o variabila de result care va raspunde de $stmt si ne va afisa rezultatele prin fetch_assoc la la ecran , in tabloul de $phones. 

$stmt = $conn -> prepare("SELECT * FROM phones");
$stmt -> execute();
$result = $stmt -> get_result();


$phones= [];

while ($row = $result -> fetch_assoc()) {
    $phones[] = $row;
}


// 

// 






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Creem formularul unde prin foreach afisam fiecare element din tablou in parte -->

    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="./admin.php" method="POST">
    <select name="img_id">

    <?php

 foreach ($phones as $phone) {
     echo "<option value='$phone[id]'>$phone[title]</option>";
 }
?>
    </select>
<!-- Creem inputuri si formularul pentru update(edit) -->
 

<input type="text" name="title" placeholder="Title" required>
        <textarea name="description" id="" cols="30" rows="5" placeholder="Description"></textarea>
        <input type="number" name="price" placeholder="Price" required step="0.01">
        <button type="submit" name="update">Edit product</button>
</form>

<!-- functionalul PENTRU IMAGINI -->
<hr>

<!-- Vom afisa fiecare element din tablou in parte ATENTIE !!! LA formular vom adauga atributul de enctype pentru a putea sa incarcam fisierele si sa interactionam cu ele -->


<!-- hr= Linie dreapta -->
<h1>Edit product images</h1>
<form action="./admin.php" method="POST" enctype="multipart/form-data">

        <select name="img_id">
            <?php
                foreach ($phones as $phone) {
                    echo "<option value='$phone[id]'>$phone[title]</option>";
                }

    ?>
    </select>
    
<label for="images">Images:</label>
<!-- Creem un input de tip file -->
        <input type="file" name="images[]" id="images" multiple accept="image/*">
        <!-- Formatul de webp sunt imagini care se descarca mai rapid -->
<!-- Multipart va fi atributul care va accepta imaginile noastre, este atributul special care accepta fisiere ATENTIE !! LA INPUT ADAUGAM atributul de mutiple accept unde vom incarca imaginile de toate extensiile  -->
<button type="submit" name="create">Add</button>

<!--  -->
</form>

    <!--  -->
    <!--  -->

    <!--  -->


    <!-- 4  -->
<!-- 1a Adaugarea formularului pentru ascunderea produsului(Soft delete) -->
<!-- 1A Adaugarea label de tip ascuns pentru ca ulterior sa ascundem produsul nostru, ascest label va permite ascunderea produsului, prin inputul de checkbox,  -->
    <hr>



    <!-- Soft delete vom face metoda de ascundere a produsului -->

    <h1>Soft Delete Product </h1>

    <form action="./admin.php" method="POST">
        <select name="img_id">
            <?php
foreach($phones as $phone) {
    echo "
    <option value = '$phone[id]'>$phone[title]</option>
    ";
}
?>
        </select>
        <label for="hidden"> Hidden:
<input type="checkbox" name="hidden" value="1">
        </label>
        <button type="submit" name="soft-delete">Save</button>
    </form>

    <!--  -->





    <!--  -->



    
    </body>
</html>