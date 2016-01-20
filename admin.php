<?php

// checkt of de admin is ingelogd, en niet een user.
include "connect.php";
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin")
{
    header("Location: login.php");
    exit();
}
//checkt welke 'status' een reservering heeft (1 = nog niet geaccepteerd, 3 = geaccepteerd, 2 = geweigerd)

if (isset($_POST["reservationID"]))
{
    $reservationID = $_POST["reservationID"];
    $status;
    if ($_POST["type"] == "accept") $status = 3;
    else if ($_POST["type"] == "decline") $status = 2;
    $queryStatus = "UPDATE " . DB_PREFIX . "reservations SET status='$status' WHERE reservationID = '$reservationID'";
    mysqli_query($conn, $queryStatus);
    $queryUser = "SELECT email FROM " . DB_PREFIX . "reservations r INNER JOIN " . DB_PREFIX . "users u ON r.userID = u.userID WHERE r.reservationID = '$reservationID'";
    $resultUser = mysqli_query($conn, $queryUser)->fetch_assoc();
    mail($resultUser["email"], "Reservering geaccepteerd", "Uw reservering is geaccepteerd. Hoera.");
}

// joint data uit meerdere tabellen die bij een reservering belangrijk zijn.

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
        WHERE status = '1'";
$result = mysqli_query($conn, $query);

if(isset($_SESSION['userID'])) {
    $loginURL = "<a href='login.php'>Log in</a>";
} else {
    $loginURL = "<a href='logout.php'>Log uit</a>";

}

?>


<!DOCTYPE html>
<head>
    <title>Kleinstra Maasbracht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href ="css/bootstrap.min.css" rel ="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php include"navBar.php" ?>

<!-- jumbotron -->

<div class="jumbotron jumbotron-special">

    <h3 class="daewoo">Admin overzicht</h3>
    <h5 class="side-title">Home / Admin overzicht</h5>

</div>

<!-- einde jumbotron -->

<!-- reserverings verzoeken, met accepteer of weiger knop -->

    <div class="container">
        <?php foreach($result as $reservation) : ?>
                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <br>
                            <ul style="list-style-type: none; border:1px solid lightgrey;text-align:auto; padding-right:10px;">
                                <h4 style=""><li><?= $reservation["name"]; ?></li></h4>
                                <h4><li><?= $reservation["startdate"]; ?></li></h4>
                                <h4><li><?= $reservation["enddate"]; ?></li></h4>
                                <h4><li><?= $reservation["firstname"] . " " . $reservation["lastname"] ?></li></h4>
                                <li>
                                    <!-- accepteer knop -->
                                    <form action="" method="post">
                                        <input type="hidden" name="type" value="accept">
                                        <input type="hidden" name="reservationID" value=<?= $reservation["reservationID"] ?>">
                                        <input type="submit" value="Accepteren" style="width:100px; height:30px;">
                                    </form>
                                </li>
                                <li>
                                    <!-- weiger knop -->
                                    <form action="" method="post">
                                        <input type="hidden" name="type" value="decline">
                                        <input type="hidden" name="reservationID" value="<?= $reservation["reservationID"] ?>">
                                        <input type="submit" value="Weigeren" style="width:100px; height:30px;">
                                        <br>
                                        </form>
                                </li>
                            </ul>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>

<!--Footer-->
<div class ="navbar navbar-default navbar-fixed-bottom">

    <div class="container">
        <p class="navbar-text pull-left">&copy; by Nanda Kleinstra</p>
        <a href ="http://youtube.com/Kleinstra"class="navbar-btn btn-danger btn pull-right">Abonneer op Youtube</a>
        <button class="navbar-btn pull-left" style="width:150px; height:35px; font-size:13px;"><a href ="reservations.php">Geaccepteerde reserveringen</a></button>
    </div>

</div>
</body>
</html>
