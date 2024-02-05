<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    require("config.php") ;

    if(!empty($_POST["marca"]) && !empty($_POST["model"]) && !empty($_POST["culoare"]) && !empty($_POST["pret"]) && !empty($_POST["stock"]) && !empty($_POST["datas"]) && !empty($_POST["sistem"]) && !empty($_POST["image"]) ) {

        $marca = $_POST["marca"];
        $model = $_POST["model"];
        $culoare = $_POST["culoare"];
        $pret = $_POST["pret"];
        $stock = $_POST["stock"];
        $datas = $_POST["datas"];
        $sistem = $_POST["sistem"];
        $image = $_POST["image"];

        $sql = "INSERT INTO creates (marca,model,culoare,pret,stock,datas,sistem,image) VALUES ('$marca', '$model', '$culoare', $pret, $stock, $datas, '$sistem', '$image')";

        $conn -> query($sql);

        header("Location: ./index.php");
    }

}


?>