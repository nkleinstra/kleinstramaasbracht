<?php
// maakt connectie met de database
require_once 'connect.php';
// start de sessie
session_start();
// stuurt ingevulde data naar de database
if(isset($_POST["username"])){
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $query = "SELECT * FROM " . DB_PREFIX . "users WHERE username =  '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);
// als er geen resultaten overeenkomsten met wat in de database staat
    if ($result->num_rows==0)
    {
        // foutmelding
        echo "Niemand gevonden";
    } else if($result->num_rows==1)
        // anders, log de user in, en stuur hem naar de homepage.
    {
        $user = $result->fetch_assoc();
        $_SESSION["userID"] = $user["userID"];
        $_SESSION["role"] = $user["role"];
        header("location:index.php");
    }
}

?>

<!-- voeg de navbar toe -->

<?php include"navBar.php" ?>

<!-- jumbotron -->

<div class="jumbotron jumbotron-special">

    <h3 class="daewoo">Log in</h3>
    <h5 class="side-title">Home / log in</h5>

</div>
<br>
<br>

<!--Login formulier -->

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
