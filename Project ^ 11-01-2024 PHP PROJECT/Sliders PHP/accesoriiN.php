<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script defer src=""></script>    
    <title>Document</title>
    <style>
        <?php
    include "../style.css"

        ?>
    </style>

    <?php
require_once "./header.php"
    ?>
</head>
<body>

<div class="contacts">
<h1>Acesorii pentru Notebook</h1>

</div>
    <div class="laptop">
    <div class="lapt2">
    <?php
$accesoriiT = [
    [
        "image" => "https://cdn1.ozone.ru/s3/multimedia-h/c1000/6191852621.jpg",
        "brand" => "Cooling pad Deepcool WIND PAL FS",
        "info" => "17*/Black", 
        "price" => 549

    ],

    [
        "image" => "https://digitik.ru/upload/iblock/404/4047ddd84bf57fb5aed562ad1709c3cd.jpg",
        "brand" => "Husă pentru laptop RivaCase 8803 Apple", 
        "info" => "13,3/Black" ,
        "price" => 419
    ], 

    [
        "image" => "https://img.flandosales.ru/images/products/1/2134/783853654/700-nw.jpg",
        "brand" => "Mouse A4Tech Bloody W60 Max",
        "info" => "XProtect", 
        "price" => 559
    ]



    
    ];


    $accesoriiTSale = [
        [
            "image" => "https://www.kopfhoerer.de/wp-content/uploads/tps_1335_451111_Oktuber53458-451111-1920x1080.jpg", 
            "brand" => "Căști JBL T500 Black",
            "info" => "Cu fir", 
            "price_init" =>653,
            "price" => 541
        ],




        [
        "image" => "http://willtake.ru/image/cache/data/tovary/noutbuki-kompyuteri-periferiya/chehol-incase-classic-sleeve-inmb10072-sgy-dlya-macbook-pro-13-2016-stone-gray_1-1000x1000.jpg", 
        "brand" => "Husă pentru laptop Incase Hardshell" ,
        "info" => "13/3 Black", 
        "price_init" =>449,
        "price" => 329
        ], 


        [
            "image" => "https://cdn1.ozone.ru/s3/multimedia-8/6017834192.jpg" ,
            "brand"=> "Mouse Sven RX-70", 
            "info" => "USB Black", 
            "price_init" => 200, 
            "price" => 139
        ]


    ] ;


    foreach ($accesoriiT as $accT) {
        echo "<div class = 'lapt2'>
        <img src = $accT[image]>
        <h2>$accT[brand]</h2>
        <h3>$accT[info]</h3>
        <p>$accT[price] MDL</p>

        </div>
        ";
    }

    ?>
    </div>

<?php
foreach ($accesoriiTSale as $sale) {
    echo "<div class = 'lapt2'>
    <img src = $sale[image] >
    <h2>$sale[brand]</h2>
    <h3> $sale[info]</h3>
    <h4> $sale[price_init] MDL</h4>
    <p>$sale[price] MDL </p>
    </div>";
}
?>
    </div>
    </div>

    <?php
require_once "footer.php";
    ?>