<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "cactus_soup";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn){
    echo "<script> alert('Connection Failed.')</script>";
}
?>