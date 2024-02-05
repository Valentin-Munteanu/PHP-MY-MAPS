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
<h1>Acesorii pentru Telefoane</h1>

</div>

    <div class="laptop">
    <div class="lapt2">
    <?php
$accesoriiT = [
    [
        "image" => "https://www.xkids.ro/wp-content/uploads/2020/07/17253_3.jpg",
        "brand" => "Husă pentru smartphone Apple iPhone 11",
        "info" => "Apple/ Back/ TPU/ Transparent", 
        "price" => 700

    ],

    [
        "image" => "https://ae01.alicdn.com/kf/H960b093b7723456b8009522ded3f81199/Original-Samsung-Galaxy-A20e-Octa-core-5-8-Inches-3GB-RAM-32GB-ROM-13MP-5MP-Dual.jpg",
        "brand" => "Husă pentru smartphone Samsung Galaxy A20", 
        "info" => "Cover X/ Back/ TPU/ Black" ,
        "price" => 99 
    ], 

    [
        "image" => "https://6772616e64.ultracdn.net/image/cache/catalog/attachments/results/b580d371-396a-4ad8-ab1e-06c156f881b3/lines/da255dc4-8af4-4abd-9f76-7a334b6c36b7/image_0-700x700.jpg",
        "brand" => "Sticlă de protecție pentru smartphone Apple iPhone",
        "info" => "XProtect", 
        "price" => 359
    ]



    
    ];


    $accesoriiTSale = [
        [
            "image" => "https://element56.ru/uploads/store/product/8abcf762b03611e88297408d5c8ee3b1_0163fc29ff5e11e8b1a37440bb724b2e.jpeg", 
            "brand" => "Cablu pentru telefon X23 Hoco USB Type-A",
            "info" => "1m/White", 
            "price_init" => 129,
            "price" => 99
        ],




        [
        "image" => "https://avatars.mds.yandex.net/get-mpic/5216453/img_id9079204948832553724.jpeg/orig", 
        "brand" => "Adapter Hama Multiport (200107)" ,
        "info" => "Silver", 
        "price_init" => 769,
        "price" => 699
        ], 


        [
            "image" => "https://smartgo.su/upload/iblock/c4a/6spzai322dlvotz80ae1rpgxf8you8mo.jpg" ,
            "brand"=> "Cablu pentru telefon MM0A3 Apple USB", 
            "info" => "1 m/ White", 
            "price_init" => 600, 
            "price" => 530
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
</body>
</html>