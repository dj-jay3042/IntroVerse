<?php
$host_name = "localhost:3306";
$user_name = "djjay";
$password = "djjay3042";
$database_name = "IntroVerse";
$conn = new mysqli($host_name, $user_name, $password, $database_name);
if ($conn == false)
    header("Location: databaseerror.php");
?>