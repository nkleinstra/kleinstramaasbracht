<?php
/*$dbCon = mysqli_connect("localhost", "root", "kleinstramaasbracht");*/
// maakt verbinding met de database
$servername = "localhost";
$username = "0918991";
$password = "cethahpa";
$db = "0918991";
define("DB_PREFIX", "kleinstra_");

$conn = new mysqli($servername, $username, $password, $db) or die ('Error: '.mysqli_connect_error());

?>