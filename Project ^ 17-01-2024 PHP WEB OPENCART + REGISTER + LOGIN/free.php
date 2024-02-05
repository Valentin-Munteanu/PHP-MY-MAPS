<?php
require_once "./config.php";

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./Sliders PHP/slider2.js"></script>
    <style>
        <?php
       include "./styles.css"

       ?>
    </style>

    <title>Document</title>
</head>
<body>


    <?php

require_once "header.php";
?>

<div class="marketplace">

<h1>Welcome to OpenCart Extension Store</h1>
<p>With a huge range of features included out-of-the-box and over 13 000+ additional extensions available to <br> download</p>
</div>
<br>

<div class="sect5">
    <h3>Catalog Featured</h3>
</div>

<br>
    <div class="button">


<a class="link" href="marketplace.php"><button>PAYMENTS</button></a>
<a class="link" href="comercial.php"><button>COMERCIAL</button></a>
<a class="link" href="free.php"><button>FREE</button></a>
</div>


<br>



<div id="slider2_PHP">
    <div id="sliders2">

<?php

$sql = "SELECT * FROM slider_m";
$results = $conn ->query($sql);
if($results -> num_rows > 0) {
    while($row = $results -> fetch_assoc()) {
        echo "
        <a class='slide' href='landing.php?id=$row[marketplace_id]'>
        <img class = 'imgs' src = '$row[url]'>
</a>";
    }
}
?>


    </div>
 
    <button id="left1">&larr;</button>
    <button id="right1">&rarr;</button>

</div>

<div class='sect7a'>
<br>
<?php
$array = [
    [
        "image" => "https://image.opencart.com/cache/6088d6d4db758-resize-260x152.jpg", 
        "title" => "PayLink opencart extension",
        "tip" => "FREE",
        "images" => "https://www.opencart.com/application/view/image/marketplace/recommended-label.svg"
    ],


    [
        "image" => "https://image.opencart.com/cache/644ec8a6a6e9d-resize-260x152.jpg", 
        "title" => "Featured Plus -Featured module", 
        "tip" => "FREE", 
        "images" => "https://www.opencart.com/application/view/image/marketplace/recommended-label.svg"
    ], 


    [

        "image" => "https://image.opencart.com/cache/584873f621b5a-resize-260x152.jpg",
        "title" => "MultiScraper PRO", 
        "tip" => "FREE", 
        "images" => "https://www.opencart.com/application/view/image/marketplace/recommended-label.svg"
    ]

    ];


$array2 = [



    [
        "image" => "https://image.opencart.com/cache/5e7840dfaed4c-resize-260x152.jpg", 
        "title" => "PHP.ini Mini Settings", 
        "tip" => "FREE", 
        "images" => "https://www.opencart.com/application/view/image/marketplace/recommended-label.svg"

    ], 


    [
        "image" => "https://image.opencart.com/cache/5eb97b02efb21-resize-260x152.jpg",
        "title" => "Hit HTML Editor for description", 
        "tip" => "FREE", 
        "images" => "https://www.opencart.com/application/view/image/marketplace/recommended-label.svg"

    ],

    [
        "image" => "https://image.opencart.com/cache/61687958909dd-resize-260x152.jpg",
        "title" => "Notifi Pixel OCMOD", 
        "tip" => "FREE", 
        "images" => "https://www.opencart.com/application/view/image/marketplace/recommended-label.svg"

    ]
    ];

    foreach($array as $arr) {
        echo "

<div class ='sect7b'>
        <img class = 'ix' src = $arr[image]>
        <br>
       <h3>$arr[title]</h3>
       <p>$arr[tip]</p>
       <br>
       <img class = 'ir' src = $arr[images]>
   </div>
";
    }

?>
 
 </div>
 <br>
 <br>
<?php

   foreach($array2 as $arrs) {
    echo "
    <div class='sect7a'>
    <div class='sect7b'>
   <img class = 'ix' src = $arrs[image]>
   <br>
   <h3>$arrs[title]</h3>
   <p>$arrs[tip]</p>
   <br>
   <img class = 'ir' src = $arrs[images]>
  

</div>";
}

?>


 
</div>
<?php
?>
</body>
</html>