<?php
session_start();

if(isset($_POST['username'])) {

    include_once("dbConnect.php");

    $usname = strip_tags($_POST['username']);
    $paswd = strip_tags($_POST['password']);

    $usname = mysqli_real_escape_string($dbCon, $usname);
    $paswd = mysqli_real_escape_string($dbCon, $paswd);

    $sql = "SELECT id, username, password FROM " . DB_PREFIX . "members WHERE username = '$usname' AND activated = '1' LIMIT 1 ";

//check if the username and the password they entered was correct

}

//session_start();
//$theUser = $_SESSION['uid'];
//
//
//$query = "SELECT * FROM users WHERE username = '$theUser'";
//echo $query;
//
//if(isset($_SESSION['uid']))
//{
//    echo "JE BENT INGLOGD";
//}
//else
//{
//    echo "JE BENT NIET INGELOGD";
//}
//
//?>


<!DOCTYPE html>
<html>
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
                <li><a href="admin.php">Admin</a></li>
                <li class="active"><a href="index.php">Home</a></li>
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

<!-- Container -->

    <div class="jumbotron">

        <br></br>

        <h1>Kleinstra & Zonen</h1>
        <p>Transport & handelsonderneming Maasbracht</p>

        <a href="https://twitter.com/share" class="twitter-share-button"{count} data-url="http://kleinstramaasbracht.nl/" data-size="large">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </div>


<!--grid system-->

<div class="container">

    <div class="row">

        <div class="col-md-9">
            <br>
            <img src="bedrijf.png" alt="bedrijf" style="width:600px;height:200px;">

            <h1>Contact</h1>

            <!--contactform-->
            <?php

            if(!isset($_SESSION)) {
                session_start();
            }

            require_once 'security.php';

            $errors= isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
            $fields= isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

            ?>

            <!doctype html>
            <html>
            <head>
                <meta charset="utf-8">
                <title>Contact form</title>

                <link rel="stylesheet" type="text/css" href="main.css">
            </head>
            <body>
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

                        <input type="text" name="naam" autocomplete="off" placeholder="Je Naam *"<?php echo isset($fields['naam']) ? 'value="' . e($fields['naam']) . '"' : '' ?>>

                        <input type="text" name="email" autocomplete="off" placeholder="Je email adres *"<?php echo isset($fields['email']) ? 'value="' . e($fields['email']) . '"' : '' ?>>

                        <label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        </label>
                        <textarea name="bericht" rows="8" placeholder="Type hier je bericht *"><?php echo isset($fields['bericht']) ? e($fields['bericht']) : '' ?></textarea>

                        <input type="submit" value="Verstuur uw bericht">

                        <p class="muted">Velden met een * mogen niet leeg blijven.</p>
                    </div>

                </form>
                </div>
            </div>
            </div>
            </body>
            </html>

            <?php
            unset($_SESSION['errors']);
            unset($_SESSION['fields']);

            ?>
            <!--contactform-->


</div>


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