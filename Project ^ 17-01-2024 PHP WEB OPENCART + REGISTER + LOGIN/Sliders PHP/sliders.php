<?php
require_once "../config.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    if($_POST["type"] === "product-btn") {
        $titlu = $_POST["title"];
        $pret = $_POST["price"];
        $url = $_POST["url"];





        $sql = "INSERT INTO products(title,price,url) 
        VALUES('$titlu', $pret, '$url')";
        $conn -> query($sql);
header("Location: ./sliders.php");


// Slider



    }

    if($_POST["type"] === "slider-P"){
        $id = $_POST["product_id"];
        $url = $_POST["url"];

        
        $sql = "INSERT INTO slider(url,product_id) 
        
        VALUES('$url', $id)";
        $conn ->query($sql);
        header("Location: ./sliders.php");

    }

    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="Title Product" required >
  <input type="text" name="url" placeholder="URL PRODUCT">
  <input type="text" name="price" placeholder="PRICE PRODUCT">
  
  <button name="type" value="product-btn">Create Product</button>

    </form>

    <form action="" method="POST">
        <select name="product_id" id="">
            <?php
$sql = "SELECT product_id, title FROM products";
$results = $conn -> query($sql);
if($results -> num_rows > 0) {
    while($row = $results -> fetch_assoc()) {
        echo "
        <option value = '$row[product_id]'>$row[title]</option>

        ";
    }
}
            ?>
        </select>

        <input type="text" name="url">
        <button name="type" value="slider-P">Create Slider</button>

    </form>

  
    <!-- Slider Marketplace -->

    <?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if($_POST["type"] === "marketplaceP") {
        $title = $_POST["title"];
        $url = $_POST["url"];



        
    $sql = "INSERT INTO marketplace_p(title,url) VALUES('$title', '$url')";
    $conn ->query($sql);
    header("Location: ./sliders.php");

    }


if($_POST["type"]=== "slider-m") {
    $product_id = $_POST["marketplace_id"];
    $url = $_POST["url"];

    $sql = "INSERT INTO slider_m(marketplace_id, url) VALUES($product_id, '$url')";
    $conn ->query($sql);
    header("Location: ./sliders.php");



}
}
    ?>

<form action="" method="POST">
    <input type="text" name="title" placeholder = "Title" required>
    <input type="text" name="url" placeholder="URL 2 " required>
<button name="type" value ="marketplaceP">Create Products 2 </button>


</form>

<form action="" method="POST">
    <select name="marketplace_id" id="">

    <?php

$sql = "SELECT marketplace_id, title FROM marketplace_p";

$results = $conn -> query($sql);
if($results -> num_rows > 0 ) {
    while($row = $results -> fetch_assoc()){
        echo "<option value = '$row[marketplace_id]'>$row[title]</option>";

    }
}
?>





    </select>

    <input type="text" name="url" placeholder="URL SLIDER1 " required>
    <button name="type" value ="slider-m">Create Slider2</button>
</form>


