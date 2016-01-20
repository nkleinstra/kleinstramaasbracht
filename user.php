<?php
// begin de sessie
session_start();

if (isset($_SESSION['id'])) {
    //zet opgeslagen variabelen in lokale php variabel
    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
    $result = "test variables: <br> Username: ".$usname. "<br> Id: ".$uid;

} else {
    $result = "Je bent nog niet ingelogd";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $usname; ?></title>
</head>
<body>
<?php
echo $result;
?>
</body>
</html>
