<?php
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$username = "root";
$password = "";
$basename = "pwa_projekt_filip_gredelj";
$tablename = "clanci";
// Create connection
$connection = mysqli_connect($servername, $username, $password, $basename) or die('Error connecting to MySQL server.' . mysqli_connect_error());
mysqli_set_charset($connection, "utf8");
//Check connection
// if ($dbc) {
//     echo "Connected successfully";
// }
