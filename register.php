<!DOCTYPE html>
<html>
<head>
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
                <li class="active"><a href="register.php">Registreer</a></li>
                <li><a href="logout.php">Log uit</a></li>

            </ul>
        </div>
    </div>
</div>
<body>
<!--Jumbotron -->
<div class="jumbotron jumbotron-special">

    <h3 class="daewoo">Registreer</h3>
    <h5 class="side-title">Home / Registreer</h5>
    </div>

<div class="container">
    <div class="row">
            <div class="register">
                <form action="insert.php" method="post">
                    <div class="col-md-6">
                        <h3>Velden met een * zijn verplicht</h3>
                            <br>
                        <h4> Gebruikersnaam * :</h4> <input type="text" id ="username" name="username" value="" style="width:200px; height:30px;"/> <br>
                        <h4>Wachtwoord * :</h4> <input type="password" id ="password" name="password" value="" style="width:200px; height:30px;"/> <br>
                        <h4>Herhaal wachtwoord * :</h4> <input type="password" id ="passwordrepeat" name="passwordrepeat" value="" style="width:200px; height:30px;"/> <br>
                        <h4>Voornaam * : </h4><input type="text" id ="firstname" name="firstname" value="" style="width:200px; height:30px;"/> <br>
                        <h4>Achternaam * : </h4><input type="text" id ="lastname" name="lastname" value="" style="width:200px; height:30px;"/> <br>
                        <h4>Geslacht * :</h4><br> <select id="gender" name="gender" style="width:200px; height:30px;"/>
                            <option value="w">Vrouw</option>
                            <option value="m">Man</option>
                        </select> <br><br><br>
                        <h4>Tussenvoegsel : </h4><input type="text" id ="nameaddition" name="nameaddition" value="" style="width:200px; height:30px;"/> <br>
                        <h4>Naam van uw bedrijf : </h4><input type="text" id ="company" name="company" value="" style="width:200px; height:30px;"/> <br>
                    </div>
                    <br> <br> <br> <br>
                    <div class="col-md-6">
                        <h4>E-mail adres *: </h4><input type="text" id ="email" name="email" value="" style="width:200px; height:30px;"/> <br>
                        <h4>Herhaal e-mail adres *: </h4><input type="text" id ="emailrepeat" name="emailrepeat" value=""style="width:200px; height:30px;"/> <br>
                        <h4>Leeftijd *: </h4><input type="number" id ="age" name="age" value=""style="width:200px; height:30px;"/> <br>
                        <h4>Telefoonnummer : </h4><input type="number" id ="phonenumber" name="phonenumber" value=""style="width:200px; height:30px;"/> <br>
                        <h4>Straatnaam *: </h4><input type="text" id ="streetname" name="streetname" value="" style="width:200px; height:30px;"/> <br>
                        <h4>Huisnummer *: </h4><input type="number" id ="housenumber" name="housenumber" value=""style="width:200px; height:30px;"/> <br>
                        <h4>Toevoeging :</h4><br> <select id ="houseaddition" name="houseaddition"style="width:200px; height:30px;">
                            <option value="a">A</option>
                            <option value="b">B</option>
                            <option value="c">C</option>
                            <option value="d">D</option>
                            <option value="e">E</option>
                        </select> <br>
                        <h4>Postcode : </h4><input type="text" id ="zipcode" name="zipcode" value=""style="width:200px; height:30px;"/> <br>
                        <h4>Stad *: </h4> <input type="text" id ="placename" name="placename" value=""style="width:200px; height:30px;"/> <br>
                        <br>
                        <input type="submit" name="submit" value="registreer" style="width:100px; height:30px;"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>