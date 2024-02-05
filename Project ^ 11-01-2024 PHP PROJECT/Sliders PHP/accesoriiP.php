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
<h1>Acesorii pentru PC</h1>

</div>
    <div class="laptop">
    <div class="lapt2">
    <?php
$accesoriiT = [
    [
        "image" => "https://i.ytimg.com/vi/Qeze7ZDMIis/maxresdefault.jpg",
        "brand" => "Tastatură HyperX Alloy Core RGB",
        "info" => "Apple/ Back/ TPU/ Transparent", 
        "price" => 700

    ],

    [
        "image" => "https://static.wixstatic.com/media/5184c2_b61ae51558ab47b1af4527a0e3db9c53~mv2.jpg/v1/fill/w_2500,h_2500,al_c/5184c2_b61ae51558ab47b1af4527a0e3db9c53~mv2.jpg",
        "brand" => "Microfon HyperX QuadCast S", 
        "info" => "Black" ,
        "price" => 3390
    ], 

    [
        "image" => "https://i5.walmartimages.com/asr/d35ae246-ebc2-48a6-b401-6bfee6cc73b1_1.9f393c17eef8c4764f5b84ecb7bc567b.jpeg",
        "brand" => "Covoraș pentru mouse A4Tech Bloody",
        "info" => "Fire Black", 
        "price" => 879
    ]



    
    ];


    $accesoriiTSale = [
        [
            "image" => "http://www.microset.ru/upload/xmlImg/elems/Y/89757.jpg", 
            "brand" => "Monitor AOC C24G2U 24 Full HD",
            "info" => "75 Hz/ 1 ms/ Black", 
            "price_init" => 5000,
            "price" => 4599
        ],




        [
        "image" => "https://images.anandtech.com/doci/10104/CF390-Curved-Monitor-1.jpg", 
        "brand" => "Monitor Samsung C24F390FHI 23.5" ,
        "info" => "60 Hz/ 4 ms/ Black", 
        "price_init" => 2900,
        "price" => 2716
        ], 


        [
            "image" => "https://m.media-amazon.com/images/I/71JUP2baTXL._AC_UF1000,1000_QL80_.jpg" ,
            "brand"=> "Monitor Philips 322E1C 32 Full HD", 
            "info" => "70Hz/4ms/Black", 
            "price_init" => 5949, 
            "price" => 5299
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