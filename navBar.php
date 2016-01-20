<?php
// als er nog geen sessie gestart is, start een sessie.
if(!isset($_SESSION)) {
    session_start();
}
// als de user ingelogd in, laat een loguit knop zien, als de user niet ingelogd is, laat een login knop zien
if(!isset($_SESSION['userID'])) {
    $loginURL = "<a href='login.php'>Log in</a>";
}   else {
    $loginURL = "<a href='logout.php'>Log uit</a>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kleinstra Maasbracht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href ="css/bootstrap.min.css" rel ="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<!-- navigatie bar -->
<div class="navbar-header navbar-inverse navbar-static-top">
    <div class="container">

        <button class="navbar-toggle" data-toggle ="collapse" data-target =".navHeaderCollapse">
            <span class ="icon-bar"></span>
            <span class ="icon-bar"></span>
            <span class ="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse navHeaderCollapse">

            <ul class="nav navbar-nav navbar-left">
                <li><a href="admin.php">Admin</a></li>
                <li><a href="index.php">Home</a></li>
                <li class="dropdown"><a href="#" class ="dropdown-toggle" data-toggle ="dropdown">Shop<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="aggegraten.php">Aggegraten</a></li>
                        <li><a href="hydrauliek.php">Hydrauliek</a></li>
                        <li><a href="koppelingen.php">Koppelingen</a></li>
                        <li><a href="lieren.php">Lieren</a></li>
                        <li><a href="motoren.php">Motoren</a></li>
                        <li><a href="schroeven.php">Schroeven</a></li>
                        <li><a href="overige.php">Overige</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="scheepvaart.php" class= "dropdown-toggle" data-toggle ="dropdown">Scheepvaart<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="vloot.php">Vloot</a></li>
                        <li><a href="duwbakverhuur.php">Duwbakverhuur</a></li>
                    </ul>
                </li>
                <li><a href="daewoo.php">Daewoo</a></li>
                <li><?= $loginURL ?></li>
                <li><a href="register.php">Registreer</a></li>
            </ul>
        </div>
    </div>
</div>