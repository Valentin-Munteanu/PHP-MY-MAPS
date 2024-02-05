<?php

require_once "../config.php";
include_once "./index.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Adaugarea de produse pentru telefoane</title>

</head>
<body>
    <!-- Crearea Crud + Incarcarea de imagini -->
<h1>Add product Phones</h1>
<form action="./admin.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" required>
    <input type="number" name="price" placeholder ="Price"required>
   <textarea placeholder="Descrierea produsului"name="description" id="" cols="20" rows="10" required></textarea>
   <label for="images">Images:</label>
   <input type="file" name="images[]" id="images" multiple accept="image/*">
   
   <button class="btn" type="submit" name="create">Add</button>

</form>
</body>
</html>