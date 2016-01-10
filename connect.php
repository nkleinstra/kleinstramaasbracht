<?php
/*$dbCon = mysqli_connect("localhost", "root", "kleinstramaasbracht");*/
$servername = "localhost";
$username = "root";
$password = "";
$db = "kleinstramaasbracht";
define("DB_PREFIX", "");

$conn = new mysqli($servername, $username, $password, $db) or die ('Error: '.mysqli_connect_error());

?>