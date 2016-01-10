<?php
session_start();

if (isset($_SESSION['id'])) {
    //Put stored variables into local php variable
    $uid = $_SESSION['id'];
    $usname = $_SESSION['username'];
    $result = "test variables: <br> Username: ".$usname. "<br> Id: ".$uid;
} else {
    $result = "You are not logged in yet";
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
