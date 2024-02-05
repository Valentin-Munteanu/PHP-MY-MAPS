<?php
require("../../config.php");

// 16 Importam config.php
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Appearance </title>
</head>
<body>
    <!-- 1 Creem un formular a caror date vor fi transmise in mapa controlers in fisierul Auth.php -->

    <main>
        <div class="container">
            <div class="register">
                <h1>Register</h1>
                <p>Complete the form to create an account </p>
                <form action="../../controllers/Auth.php" method="POST">
                    <input type="text" name="login" placeholder="Login">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <button name="type" value="REGISTER">Register</button>
                </form>
                <!-- Butonul cu name de type tot poate trimite informatii   -->
                <!-- Rezulta ca odata ce formularul va fi tranmis impreuna cu butonul care are numele de type si valoare toate datele se vor duce in mapa de controlers in fisierul de AUTH.php
                Contatam ca informatia din buton va transmisa in continut diferit
                
             -->


                <!-- In mapa de controlers vom face elemente care vor raspunde de toate actiunile pentru auntenficare a unui utilizator  -->
          <?php

        //   17 VERIFICAM DACA EXISTA VARIABILA DIN SESIUNE register_errors 
// 18 Daca in Sesiune exista erori de inregistrare creem un foreach prin care vom apela fiecare eroare in parte
// 18a Prin un echo vom afisa fiecare eroare care va exista intr-un paragraf

if(isset($_SESSION["register_errors"])){
foreach($_SESSION["register_errors"] as $err) {
echo "<p class = 'error'>$err</p>";
}
}
          ?>
          
          
            </div>

        </div>
    </main>
</body>
</html>