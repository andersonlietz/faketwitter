<?php
//LOCAL

$hostname = "localhost";
$username = "root";
$password = "";
$database = "twitterdb";

//SERVIDOR

// $hostname = "localhost";
// $username = "lietzdev_lietzdev";
// $password = "kavTg.Q#E^Hw";
// $database = "lietzdev_twitter";

$conn = mysqli_connect($hostname, $username, $password, $database);
mysqli_set_charset( $conn,'utf8');//
$resultado = mysqli_query($conn, "SELECT * from postagens ORDER BY id DESC ");
$linha = mysqli_fetch_assoc($resultado);

$message = mysqli_query($conn, "SELECT * from contato ORDER BY id DESC ");


// $usuarios = mysqli_query($conn, "SELECT * from users ORDER BY id DESC ");
// $user = mysqli_fetch_assoc($usuarios);

