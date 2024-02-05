
<style>
<?php
include "./styles.css";
?>
</style>
<?php
$name = "Andrii";
$age = 130;
$isAlive = true;
$hobbies = ["Sleep", "Eat", "Coding" , "Gaming"];

echo "<h1>Eu is $name and I am $age years old </h1>";

print_r($hobbies);

foreach ($hobbies as $hobby) {
    echo "<h3> $hobby</h3>";
}

echo "<h3>My bad hobby is $hobbies[0]</h3>";
echo "<h3>My fav hobby is $hobbies[2]</h3>";

$name.= " BureaVaika ";
$age -= 50;
echo "<h1>$name</h1>";

$cars = [
[
    "brand" => "Mercedes" , 
    "model" => "G Class" , 
    "year" => 2023,
    "price" => 250000,
    "image" => "https://motor.ru/imgs/2021/09/06/07/4872435/3943dc2f1de2016585ce30cfa1fd0ab225ad0ae6.jpg"
], 

[
"brand" => "Porsche" ,
"model" => "911 GT 3 RS" ,
"year" => 2023,
"price" => 185000,
"image" => "https://natachku.ru/images/Foto1/23/Porsche_911_Carrera_T_2023-1.jpg"
],

[
    "brand" => "Rolls-Royce",
    "model" => "Ghost", 
    "year" => 2022,
    "price" => 780000,
    "image" => "http://www.mansory-tuning.ru/assets/catalog/models/rolls-royce/ghost-2/rolls-royce-ghost-2-mansory.jpg"
]
];

// echo $cars[0]["brand"];

// La acest echo avem nevoie de specificare ex: din Tabloul de cars apelam elementul 0 care va fi brand, iar prin ghilimele il vom specifica, mai jos nu il specificam deoarece echo din foreach (div) este in ghilimele . 


foreach($cars as $car) {
    echo "<div class='car'>
    <img src = $car[image]>
    <h2>$car[brand] $car[model]</h2>
    <p> Year: $car[year]</p>
    <p> Price: $car[price] &euro;</p>
    
    </div>";
    
}
?>
