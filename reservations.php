<?php
include "connect.php";
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin")
{
    header("Location: login.php");
    exit();
}

if (isset($_POST["reservationID"]))
{
    $reservationID = $_POST["reservationID"];
    $status;
    if ($_POST["type"] == "accept") $status = 3;
    else if ($_POST["type"] == "decline") $status = 2;
    $queryStatus = "UPDATE " . DB_PREFIX . "reservations SET status='$status' WHERE reservationID = '$reservationID'";
    mysqli_query($conn, $queryStatus);
}

$query = "SELECT
            r.reservationID,
            r.startdate,
            r.enddate,
            s.name,
            u.firstname,
            u.lastname
        FROM " . DB_PREFIX . "reservations r
          INNER JOIN " . DB_PREFIX . "ships s
            ON r.shipID = s.shipID
          INNER JOIN " . DB_PREFIX . "users u
            ON r.userID = u.userID
        WHERE status = '2' OR '3'";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html xmlns:float="http://www.w3.org/1999/xhtml">
<head>
    <title>Kleinstra Maasbracht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href ="css/bootstrap.min.css" rel ="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<div class="navbar-header navbar-inverse navbar-static-top">
    <div class="container">

        <button class="navbar-toggle" data-toggle ="collapse" data-target =".navHeaderCollapse">
            <span class ="icon-bar"></span>
            <span class ="icon-bar"></span>
            <span class ="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse navHeaderCollapse">

            <ul class="nav navbar-nav navbar-left">

                <li><a class="active" href="admin.php">Admin</a></li>
                <li><a href="index.php">Home</a></li>
                <li class="dropdown"><a href="shop.html" class ="dropdown-toggle" data-toggle ="dropdown">Shop<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="aggegraten.html">Aggegraten</a></li>
                        <li><a href="hydrauliek.html">Hydrauliek</a></li>
                        <li><a href="koppelingen.html">Koppelingen</a></li>
                        <li><a href="lieren.html">Lieren</a></li>
                        <li><a href="motoren.html">Motoren</a></li>
                        <li><a href="schroeven.html">Schroeven</a></li>
                        <li><a href="overige.html">Overige</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="scheepvaart.html" class= "dropdown-toggle" data-toggle ="dropdown">Scheepvaart<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="vloot.html">Vloot</a></li>
                        <li><a href="duwbakverhuur.php">Duwbakverhuur</a></li>
                    </ul>
                </li>
                <li><a href="daewoo.html">Daewoo</a></li>
                <li><a href="login.php">Log in</a></li>
                <li><a href="register.php">Registreer</a></li>
                <li><a href="logout.php">Log uit</a></li>
            </ul>
        </div>

    </div>
</div>
<!-- jumbotron -->

<div class="jumbotron jumbotron-special">

    <h3 class="daewoo">Geaccepteerde reservaties</h3>
    <h5 class="side-title">Home / Admin panel / Geaccepteerde reservaties</h5>

</div>
<br>
<div class="container">
    <?php foreach($result as $reservation) : ?>
        <div>
            <div class="row">
                <div class="col-md-3">
                    <br>
                    <ul style="list-style-type: none; border:1px solid lightgrey;text-align:auto; padding-right:10px;">
                        <h4><li><?= $reservation["name"]; ?></li></h4>
                        <h4><li><?= $reservation["startdate"]; ?></li></h4>
                        <h4><li><?= $reservation["enddate"]; ?></li></h4>
                        <h4><li><?= $reservation["firstname"] . " " . $reservation["lastname"] ?></li></h4>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class ="navbar navbar-default navbar-fixed-bottom">

    <div class="container">
        <p class="navbar-text pull-left">&copy; by Nanda Kleinstra</p>
        <a href ="http://youtube.com/Kleinstra"class="navbar-btn btn-danger btn pull-right">Abonneer op Youtube</a>
    </div>

</div>
</body>
</html>
