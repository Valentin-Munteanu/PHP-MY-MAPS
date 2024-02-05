<?php
// 1 Conectiunea cu baza de date + php + VERIFICAREA DACA CONECTIUNEA A AVUT LOC CU SUCCES

$conn = new mysqli("localhost" ,"root", "", "slider_php");

if($conn -> connect_error) {
    die("Error Failed Conection:".$conn -> connect_error);
}