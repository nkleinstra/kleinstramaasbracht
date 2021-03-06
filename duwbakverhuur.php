<?php
session_start();
include "connect.php";

if(!isset($_SESSION['userID']))
{
    header("location:login.php");
}
if(isset($_POST["shipID"]))
{
    $shipID = $_POST['shipID'];
    $userID = $_SESSION['userID'];
    $startdateArr = explode("/", $_POST["startdate"]);
    $startdate = $startdateArr[2] . "-" . $startdateArr[1] . "-" . $startdateArr[0];
    $enddateArr = explode("/", $_POST["enddate"]);
    $enddate = $enddateArr[2] . "-" . $enddateArr[1] . "-" . $enddateArr[0];

    $query = "INSERT INTO " . DB_PREFIX . "reservations (startdate, enddate, userID, shipID)
              VALUES ('$startdate', '$enddate', '$userID', '$shipID')";

        header('Location: thanks2.php');


} else {

}



?>

<!DOCTYPE html>
<html>
<head>
    <title>Kleinstra Maasbracht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href ="css/bootstrap.min.css" rel ="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker3.standalone.min.css">
</head>
<body>

<?php include"navBar.php" ?>

<!-- jumbotron -->

<div class="jumbotron jumbotron-special">

    <h3 class="daewoo">Duwbakverhuur</h3>
    <h5 class="side-title">Home / Scheepvaart / Duwbakverhuur</h5>

</div>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>
            <br>

            <h1>Duwbak verhuur</h1>

            <h3>Hieronder vindt u een overzicht van onze duwbakken, welke wij ook verhuren.</h3>

<!-- einde jumbotron -->

<!--responsive tabel -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <ul class="nav nav-tabs responsive">
                            <li class="active">
                                <a data-toggle="tab" href="#tab1">Bart</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab2">Bas</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab3">Koert</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab4">Rik</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab5">Vasco</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab6">Roel</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab7">Wim</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade">
                                <table class="table table-striped table-bordered table-hover footable toggle-medium">
                                    <tbody>
                                    <tr>
                                        <td><img src="pictures/duwbakverhuur/bart.jpg" alt="bart" style="width:350px;height:250px;float:left;">
                                            <p style="font-size:20px;">
                                                <b>Lengte</b>: 77 m.<Br>
                                                <b>Breedte</b>:	11 m.<Br>
                                                <b>Max. diepgang</b>: 3,20 m.<Br>
                                                <b>Laadvermogen</b>: 2102 ton<Br>
                                                <b>Inhoud onder luiken</b>: 2400 m3<br>
                                                <b>Prijs per dag</b>: € 350<br> </p>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab2" class="tab-pane fade active in">
                                <table class="table table-striped table-bordered table-hover footable toggle-medium">
                                    <tbody>
                                    <td>
                                        <img src="pictures/duwbakverhuur/bas.jpg" alt="Bas" style="width:350px;height:250px;float:left;">
                                        <p style="font-size:20px;">
                                            <b>Lengte</b>: 77 m.<Br>
                                            <b>Breedte</b>:	11 m.<Br>
                                            <b>Max. diepgang</b>: 2,80 m.<Br>
                                            <b>Laadvermogen</b>: 1828 ton<Br>
                                            <b>Inhoud onder de luiken</b>: open<br>
                                            <b>Prijs per dag</b>: € 350<br> </p>
                                        </p>
                                    </td>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab3" class="tab-pane fade">
                                <table class="table table-striped table-bordered table-hover footable toggle-medium">
                                    <tbody>
                                    <td>
                                        <img src="pictures/duwbakverhuur/koert.jpg" alt="Koert" style="width:350px;height:250px;float:left;">
                                        <p style="font-size:20px;">
                                            <b>Lengte</b>: 65,61 m.<Br>
                                            <b>Breedte</b>: 8,20 m.<Br>
                                            <b>Max. diepgang</b>: 2,63 m.<Br>
                                            <b>Laadvermogen</b>: 1076<Br>
                                            <b>inhoud onder luiken</b>: open<br>
                                            <b>Prijs per dag</b>: € 350<br> </p>
                                        </p>
                                    </td>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab4" class="tab-pane fade">
                                <table class="table table-striped table-bordered table-hover footable toggle-medium">
                                    <tbody>
                                    <td>
                                        <img src="pictures/duwbakverhuur/rik.jpg" alt="Rik" style="width:350px;height:250px;float:left;">
                                        <p style="font-size:20px;">
                                            <b>Lengte</b>: 77 m.<Br>
                                            <b>Breedte</b>:	11 m.<Br>
                                            <b>Max. diepgang</b>: 3,20 m.<Br>
                                            <b>Laadvermogen</b>: 2102 ton<Br>
                                            <b>inhoud onder luiken</b>: 2400 m3<br>
                                            <b>Prijs per dag</b>: € 350<br> </p>
                                        </p>
                                    </td>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab5" class="tab-pane fade ">
                                <table class="table table-striped table-bordered table-hover footable toggle-medium">
                                    <tbody>
                                    <td>
                                        <img src="pictures/duwbakverhuur/vasco.jpg" alt="Vasco" style="width:350px;height:250px;float:left;">
                                        <p style="font-size:20px;">
                                            <b>Lengte</b>: 96 m.<Br>
                                            <b>Breedte</b>:	11,50 m.<Br>
                                            <b>Max. diepgang</b>: 2,66 m.<Br>
                                            <b>Laadvermogen</b>: 2037 ton<Br>
                                            <b>Inhoud onder luiken</b>: 3800 m3<Br>
                                            <b>Prijs per dag</b>: € 350<br> </p>
                                    </td>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab6" class="tab-pane fade">
                                <table class="table table-striped table-bordered table-hover footable toggle-medium">
                                    <tbody>
                                    <td>
                                        <img src="pictures/duwbakverhuur/roel.jpg" alt="Roel" style="width:350px;height:250px;float:left;">
                                        <p style="font-size:20px;">
                                            <b>Lengte</b>: 77 m.<Br>
                                            <b>Breedte</b>:	11 m.<Br>
                                            <b>Max. diepgang</b>: 2,80 m<Br>
                                            <b>Laadvermogen</b>: 1826 ton<Br>
                                            <b>inhoud onder luiken</b>: 2000 m3<Br>
                                            <b>Prijs per dag</b>: € 350<br> </p>
                                    </td>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab7" class="tab-pane fade">
                                <table class="table table-striped table-bordered table-hover footable toggle-medium">
                                    <tbody>
                                    <td>
                                        <img src="pictures/duwbakverhuur/wim.jpg" alt="Wim" style="width:350px;height:250px;float:left;">
                                        <p style="font-size:20px;">
                                            <b>Lengte</b>: 77 m.<Br>
                                            <b>Breedte</b>:	11 m.<Br>
                                            <b>Max. diepgang</b>: 3,20 m<Br>
                                            <b>Laadvermogen</b>: 2155 ton<Br>
                                            <b>inhoud onder luiken</b>: 2400 m3<Br>
                                            <b>Prijs per dag</b>: € 350<br> </p>

                                    </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--einde responsive tabel -->

<!--Formulier voor reserveringen -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <!--hier selecteert de user een schip -->
                        <h3>Selecteer hier een schip wat U zou willen huren.</h3>
                        <select id="ship" name="shipID" required style="width:120px; height:30px; font-size:20px;">
                            <option value="0"></option>
                            <option value="1">Bart</option>
                            <option value="2">Bas</option>
                            <option value="3">Koert</option>
                            <option value="4">Rik</option>
                            <option value="5">Vasco</option>
                            <option value="6">Roel</option>
                            <option value="7">Wim</option>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <!--hier selecteert de user een begin datum van verhuur -->
                <h3>Selecteer hier de gewenste huurperiode.</h3>
                <div class="row">
                    <div class="col-md-6">
                       <h3>van</h3> <div id="startdate" class="input-group date">
                            <input type="text" required name="startdate" class="form-control">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                    </div>
                    <!--hier selecteert de user een eind datum van verhuur -->
                    <div class="col-md-6">
                        <h3>tot</h3> <div id="enddate" class="input-group date">
                            <input type="text" required name="enddate" class="form-control">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- informatie -->
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <br>
                        <h4>De betaling word afgehandeld als het schip word opgehaald.
                            U krijgt een bevestiging van uw reservatie,
                            als de admin deze heeft goedgekeurd <br> dit kan even duren.
                        </h4>
                        <br>
                        <input type="submit" name="submit" value="Reserveer" style="width:100px; height:40px; font-size:20px;"/>
                    </div>
                </div>
            </form>
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
<!--einde Footer-->

<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!--Javascript-->
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-datepicker.nl.min.js"></script>
<script>

// datepicker

    $('#startdate').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "nl",
        todayHighlight: true
    });

    $('#enddate').datepicker({
        format: "dd/mm/yyyy",
        todayBtn: "linked",
        language: "nl",
        todayHighlight: true
    });

</script>
<script>
    $(document).ready(function(){
//
//        fakewaffle.responsiveTabs(['xs']);
//        $('.footable').footable();

        var panelView = $('.panel-group.responsive').is(':visible');
        $( window ).resize( function () {
            if ( $('.panel-group.responsive').is(':visible') != panelView ) {
                $('.footable').removeClass('footable-loaded').footable();
                panelView = $('.panel-group.responsive').is(':visible');
            }
        } );
    });
</script>
</body>
</html>