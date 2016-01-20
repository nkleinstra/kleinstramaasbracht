<?php
// maak connectie met de database.
include'connect.php';
// als er nog geen sessie is gestart, start de sessie.
    if(!isset($_SESSION)) {
        session_start();
        // vernietig de sessie en stuur de user weer naar de index
    }
    session_destroy();
    header("Location: index.php");

?>