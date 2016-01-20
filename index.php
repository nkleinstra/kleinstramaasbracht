<?php
//sessie begint voor de login
session_start();

if(isset($_POST['username'])) {

    include_once("dbConnect.php");

    $usname = strip_tags($_POST['username']);
    $paswd = strip_tags($_POST['password']);

    $usname = mysqli_real_escape_string($dbCon, $usname);
    $paswd = mysqli_real_escape_string($dbCon, $paswd);

    $sql = "SELECT id, username, password FROM " . DB_PREFIX . "members WHERE username = '$usname' AND activated = '1' LIMIT 1 ";

}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Kleinstra Maasbracht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href ="css/bootstrap.min.css" rel ="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<!-- navigatie bar word toegevoegd -->

<?php include"navBar.php" ?>

<!-- Jumbtoron -->

    <div class="jumbotron">

        <br></br>

        <h1>Kleinstra & Zonen</h1>
        <p>Transport & handelsonderneming Maasbracht</p>

        <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://kleinstramaasbracht.nl/" data-size="large">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </div>

<div class="container">

    <div class="row">

        <div class="col-md-9">
            <br>
            <img src="pictures/algemeen/bedrijf.png" alt="bedrijf" style="width:600px;height:200px;">

            <h1>Contact</h1>

            <!--contactformulier sessie begint-->
            <?php

            if(!isset($_SESSION)) {
                session_start();
            }

            require_once 'security.php';

            $errors= isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
            $fields= isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

            ?>
            <!-- contactformulier invulvelden -->
            <div class="contact" id="contact-form-home">

                <?php if(!empty($errors)): ?>
                    <div class="panel">
                        <ul><li><?php echo implode('</li><li>',$errors) ?></li></ul>
                    </div>
                <?php endif; ?>
                <div class="container">
                <form class="content" action="contact.php" method="post">
                    <div class="row">
                    <div class="col-md-10">
                        <!-- naam veld -->
                        <input style="font-size:15px;" type="text" name="naam" autocomplete="off" placeholder="Je Naam *"<?php echo isset($fields['naam']) ? 'value="' . e($fields['naam']) . '"' : '' ?>>
                        <!-- email veld -->
                        <input style="font-size:15px;" type="text" name="email" autocomplete="off" placeholder="Je email adres *"<?php echo isset($fields['email']) ? 'value="' . e($fields['email']) . '"' : '' ?>>

                        <label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        </label>
                        <!-- bericht veld -->
                        <textarea style="font-size:15px;" name="bericht" rows="8" placeholder="Type hier je bericht *"><?php echo isset($fields['bericht']) ? e($fields['bericht']) : '' ?></textarea>
                        <!-- verstuur knop -->
                        <input style="font-size:15px; height:30px; width:100px;" type="submit" value="Verstuur">
                        <br>
                        <br>
                        <p style="font-size:15px;" class="muted">Velden met een * mogen niet leeg blijven.</p>
                    </div>

                </form>
                </div>
            </div>
            </div>
    </div>
            <?php
            unset($_SESSION['errors']);
            unset($_SESSION['fields']);

            ?>

    <!-- contact gegevens kleinstra & zonen -->

        <div class="col-md-3">

            <h2>Contactgegevens</h2>
            <h4>Kleinstra en Zonen V.O.F.</h4>
            <h4>Veerweg 7</h4>
            <h4>6051 AH MAASBRACHT</h4>
            <br>
            <h4>tel : +31 475 461648</h4>
            <h4>fax : +31 475 461120</h4>
            <br>
            <h4>KvK Roermond : 130.15.650</h4>
            <h4>BTW-nr : NL.00.39.52.563.B.01</h4>
            <h4>ING bank Maasbracht : 682764523</h4>
            <h4>IBAN: NL63 INGB 0682 7645 23</h4>
            <h4>BIC: INGBNL2A</h4>

        </div>


    <!--Footer-->
    <div class ="navbar navbar-default navbar-fixed-bottom">

        <div class="container">
            <p class="navbar-text pull-left">&copy; by Nanda Kleinstra</p>
            <a href ="http://youtube.com/Kleinstra"class="navbar-btn btn-danger btn pull-right">Abonneer op Youtube</a>
        </div>

    </div>

    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--Javascript-->
    <script src="js/bootstrap.js"></script>
</body>
</html>