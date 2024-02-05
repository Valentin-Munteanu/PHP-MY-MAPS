<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <script defer src="./Sliders PHP/sliderT.js"></script>
    <style>
        <?php
include "./style.css"
        ?>
    </style>
    
    <?php
require_once "header.php";
require_once "./Sliders PHP/config.php";

    ?>
</head>




<body>



<div id="slider-list">
    <div id="sliderT">
        
    <?php
$sql = "SELECT * FROM slider3";
$results = $conn -> query($sql);
if($results -> num_rows > 0) {
    while($row = $results -> fetch_assoc()) {
        echo "
        <a class='slide' href='./Sliders PHP/accesoriiP.php?id=$row[product_id]'>
            <img src='$row[url]'>
        </a>";
    }
}
    ?>
    </div>

</div>

<div class="btr">
<button id="left-cat">&larr;</button>
    <button id="right-cat">&rarr;</button>
</div>
<br>


<div class="laptop">
<div class="lapt2">

<?php
$arrayPC = [
    [
"image" => "https://www.notebookcheck.net/fileadmin/_processed_/a/3/csm_P400_Razer_b688ca8138.jpg",
"brand" => "Games PC Navigator 00435",
"info" => "Core i7 13700KF/ 32 GB/ 2 TB/ Geforce RTX 4070 Ti", 
"price" => 49999

    ],

    [
        "image" => "https://cdn.shopify.com/s/files/1/0025/1206/0515/products/M73_SFF_6_1024x1024.jpg?v=1589835524", 
        "brand" => "PC Lenovo ThinkCentre M70c", 
        "info" => "Pentium G6400/ 4 GB/ 1 TB", 
        "price" => 6649
    ],

    [
        "image" => "https://90a1c75758623581b3f8-5c119c3de181c9857fcb2784776b17ef.ssl.cf2.rackcdn.com/605915_924217_03_front_zoom.jpg",
        "brand" => "PC  Dell Vostro 3681 SFF", 
        "info" => "Core i3 10100/ 4 GB/ 1 TB/ UHD Graphics 630", 
        "price" => 7690
    ]
    ];


    $PC = [
        [
"image" => "https://www-konga-com-res.cloudinary.com/w_400,f_auto,fl_lossy,dpr_3.0,q_auto/media/catalog/product/O/V/148116_1592469921.jpg" ,
"brand" => "PC Lenovo ThinkCentre M70c", 
"info" => "Core i3 10100/ 4 GB/ 256 GB", 
"price_init" => 9300,
"price" => 8700
        ],

        [
            "image" => "https://i.pinimg.com/originals/49/11/af/4911aff4af7e001e06b47c89dd86f163.jpg", 
            "brand" => "PC GAMES Navigator 00449", 
            "info" => "Ryzen 5 5500/ 16 GB/ 1 TB/ 256 GB/ GeForce GTX 1650 OC", 
            "price_init" => 12000,
            "price" => 11999
        ], 

        [
            "image" => "https://gearopen.com/wp-content/uploads/2018/11/mac-mini-core-i5-8gb-ram-1tb-hd-mac-os-apple-D_NQ_NP_988991-MLB26237058728_102017-F.jpg", 
            "brand" => "Mini PC Apple Mac Mini 2023", 
            "info" => "M2/ 8 GB/ 512 GB", 
            "price_init" => 18499,
            "price" => 16999
        ]
        ];



        foreach ($arrayPC as $arp) {
            echo "
            <div class = 'lapt2'>
        <img src = $arp[image] >
        <h1>$arp[brand]</h1>
        <h3>$arp[info]</h3>
        <p>$arp[price] MDL </p>
            </div>
            ";
        }
?>
</div>
<?php
        foreach($PC as $pcs) {
            echo "
            <div class = 'lapt2'>
            <img src = $pcs[image]>
            <h1>$pcs[brand]
            <h3>$pcs[info]</h3>
        <h4>$pcs[price_init] MDL </h4>
        <p>$pcs[price] MDL </p>
        </div>
        
            ";
        }
?>
</div>
    </div>
    <?php
require_once "footer.php";
    ?>
</body>
</html>