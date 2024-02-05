<?php
require_once "config.php";


// Importarea de config.php = PHP CONNECT MYSQL


if($_SERVER["REQUEST_METHOD"] === "POST") {
    if($_POST["type"] === "product-create") {
        $title = $_POST["title"];
        $price = $_POST ["price"];
        $url = $_POST ["url"];


        $sql = "INSERT INTO products(title,price,url)
        VALUES('$title', $price, '$url')";
        $conn ->query($sql);
        header("Location: ./fullP.php");
    }



    if($_POST["type"] === "slider_create") {
        $productid = $_POST["product_id"];
        $url = $_POST["url"];

        $sql = "INSERT INTO slider(url,product_id) VALUES('$url', $productid)";
        $conn -> query($sql);
        header("Location: ./fullP.php");
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
        <input type="text" name="title" placeholder="Titles...">
    <input type="number" name="price" placeholder="Price">

        <input type="text" name="url" placeholder="URL">
<button name="type" value="product-create">Create</button>
<!-- Formularul pentru produse -->

    </form>

    <form action="" method="POST">
        <select name="product_id" id="">

        <?php
$sql = "SELECT product_id , title FROM products";
$results = $conn ->query($sql);
if($results -> num_rows > 0) {
    while($row = $results -> fetch_assoc()) {
        echo "<option value = '$row[product_id]'> $row[title]</option>";
    }
}
        ?>
        </select>

        <input type="text" name="url" placeholder = "url">
        <button name="type" value="slider_create">Create Slider</button>
    </form>




<!-- Slider Notebook 2  -->

<!-- Inseram valorile in products2 -->

<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    if($_POST["type"] === "productN-create") {
        $title = $_POST["title"];
        $price = $_POST["price"];
        $url = $_POST["url"];

        $sql = "INSERT INTO products2(title, price, url) VALUES('$title', $price , '$url') ";
        $conn -> query($sql);
        header("Location: ./fullP.php");
    }


    // Inseram valorile in tabelul de slider2 
if($_POST["type"]==="slide2_create"){
    $productID = $_POST["product_id"];
    $url = $_POST["url"];

    $sql = "INSERT INTO slider2(url,product_id) VALUES('$url', $productID)";
    $conn -> query($sql);
    header("Location: ./fullP.php");
}

}


?>
<br>
    <!-- Slider Notebook 2  -->
<form action="" method="POST">
    <input type="text" name="title" placeholder="Title 2 Notebook">
    <input type="number" name="price" step="0.01" placeholder="Price2 Notebook">
    <input type="text" name="url" placeholder="Url from notebooks">
<button name="type" value="productN-create">Create Product </button>
</form>
<!-- Prin aceasta metoda vom crea formularul in care vom conecta campurile si valorile campurilor din tabelul de products afisind valorile prin select, option -->

<form action="" method="POST">
    <select name="product_id" id="">
 

<?php
$sql = "SELECT product_id, title FROM products2";

$results = $conn -> query($sql);
if($results -> num_rows > 0) {
    while($row = $results -> fetch_assoc()) {
        echo "<option value = '$row[product_id]'>$row[title]</option>";
    }
}
?>


</select>





    <input type="text" name="url" placeholder = 'Url slider Notebook'>
<button name="type" value="slide2_create">Create</button>

    </select>
</form>




<!-- Slider 3 PC  -->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["type"] === "product-slider") {
        $title = $_POST["title"];
        $price = $_POST["price"];
        $url = $_POST["url"];

        
        $sql = "INSERT INTO products3 (title, price, url) VALUES ('$title', $price, '$url')";
        $conn->query($sql);
        header("Location: ./fullP.php");

}

if($_POST["type"] === "slider3-create") {
    $productIDS = $_POST["product_id"];
    $url = $_POST["url"];

    $sql = "INSERT INTO slider3(url,product_id) VALUES('$url', $productIDS)";
    $conn -> query($sql);
    header("Location: ./fullP.php");
}
}
?>

<br>
        
    <!-- Slider 3 PC  -->
<form action="" method="POST">
    <input type="text" name="title" placeholder = 'Title3 Product PC' >
<input type="number" name="price" step="0.02" placeholder="Price Product PC " >
<input type="text" name="url" placeholder ="Url Slider 3">

<button name="type" value = 'product-slider'>Create Product SLIDER 3</button>

     
</form>

<form action="" method="POST">
    <select name="product_id" id="">
        <?php
$sql = "SELECT product_id, title FROM products3";
$results = $conn -> query($sql);
if($results -> num_rows > 0) {
    while($row = $results -> fetch_assoc()) {
        echo "
        <option value= '$row[product_id]'>$row[title]</option>
                ";
    }
}
        ?>
    </select>


    <input type="text" name="url" placeholder ='URL SLIDER 3 '>
    <button name="type" value="slider3-create">Create</button>

</form>
    
</body>
</html>
