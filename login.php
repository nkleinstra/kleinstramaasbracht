<?php
require_once 'connect.php';
session_start();
if(isset($_POST["username"])){
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $query = "SELECT * FROM " . DB_PREFIX . "users WHERE username =  '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if ($result->num_rows==0)
    {
        echo "Niemand gevonden";
    } else if($result->num_rows==1)
    {
        $user = $result->fetch_assoc();
        $_SESSION["userID"] = $user["userID"];
        $_SESSION["role"] = $user["role"];
        header("location:index.php");
    }
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

<div class="navbar-header navbar-inverse navbar-static-top">
    <div class="container">

        <button class="navbar-toggle" data-toggle ="collapse" data-target =".navHeaderCollapse">
            <span class ="icon-bar"></span>
            <span class ="icon-bar"></span>
            <span class ="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse navHeaderCollapse">

            <ul class="nav navbar-nav navbar-left">

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

    <h3 class="daewoo">Log in</h3>
    <h5 class="side-title">Home / log in</h5>

</div>
<br>
<br>
<!--LOGIN SYSTEM -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="wrapper">
                <form id="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <h4>Gebruikersnaam:</h4> <input type="text" name="username" style="width:200px; height:30px;"/> <br>
                    <h4>Wachtwoord:</h4> <input type="password" name="password" style="width:200px; height:30px;"/> <br>
                    <input type="submit" value="log in" name="Submit" style="width:100px; height:30px; font-size:15px;"/>
                </form>
            </div>
        </div>
    </div>
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
