<?php


$userName = 'root'; 

$hostName   = 'localhost'; 

$password = ''; 

$databaseName = 'be21_cr4_chidi_biglibrary'; 

$connect = mysqli_connect($hostName,$userName,$password,$databaseName);

if (!$connect){
    die("connection failed");
}
    

?>