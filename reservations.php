<?php
// maak een connectie met de database
include "connect.php";
session_start();
// als de user niet ingelogd is als admin, stuur hem door naar de login pagina.
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin")
{
    header("Location: login.php");
    exit();
}
// laat alleen de reserveringen zien die nog niet geaccepteerd zijn
if (isset($_POST["reservationID"]))
{
    $reservationID = $_POST["reservationID"];
    $status;
    if ($_POST["type"] == "accept") $status = 3;
    else if ($_POST["type"] == "decline") $status = 2;
    $queryStatus = "UPDATE " . DB_PREFIX . "reservations SET status='$status' WHERE reservationID = '$reservationID'";
    mysqli_query($conn, $queryStatus);
}
// onderstaande data is zichtbaar op de pagina
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
    <!-- css -->
    <link href ="css/bootstrap.min.css" rel ="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<!-- navigatie bar -->
<?php include"navBar.php" ?>

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

<!-- footer -->

<div class ="navbar navbar-default navbar-fixed-bottom">

    <div class="container">
        <p class="navbar-text pull-left">&copy; by Nanda Kleinstra</p>
        <a href ="http://youtube.com/Kleinstra"class="navbar-btn btn-danger btn pull-right">Abonneer op Youtube</a>
    </div>

</div>
</body>
</html>
