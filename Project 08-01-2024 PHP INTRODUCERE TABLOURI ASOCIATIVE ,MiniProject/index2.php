<?php
$listings = [
    [
"id" => "1",
"title" => "Lopata pentru iarna" ,
"description" => "N-ai lopata ? Cumpara si vei avea", 
"price" => 400,
"image" => "https://spb.invoz.ru/upload/iblock/4b4/lopata_shtykovaya_fiskars_basic_1028542.jpg"

    ],

    [
        "id" => "2", 
        "title" => "Lumanare pentru camera cu miros de Dacia ", 
        "description" => "Nu stii cum miroase in Dacia ? Cumpara si vei sti. " ,
        "price" => 250,
        "image" => "https://3.bp.blogspot.com/-HzoOeZmFFX0/VPddE-sYlzI/AAAAAAAADyI/LP7V1WQA9yM/s1600/1-Lumanare-de-botez-sau-cununie-aprinsa..jpg"


    ], 

    [
        "id" => "3", 
        "title" => "Caine de paza INOPLANETEAN cu Ochi ca Nasturii de la CUFAIKA  ",
        "description" => "Stii de OHRANA ? Ieti un INOPLANETEAN si vei dorni linistit(СЛОВА LU BITKA )",
        "price" => 500,
        "image" => "https://proza.ru/pics/2011/10/13/1727.jpg"
    ]
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        include "./style.css";
        ?>
    </style>
</head>
<body>
    <?php
include "./header.php";


    ?>

    <main>
        <div class="catalog">
            <?php
foreach($listings as $list) {
    echo "<div class='listing'>
<img src= $list[image]>
    <h2>$list[title]</h2>
    <h3>$list[price] MDL </h3>
    <p>$list[description]</p>

    </div>";
}
            ?>

        </div>
    </main>
</body>
</html>