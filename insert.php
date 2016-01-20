<?php
//stuurt alle ingevulde data naar de database

include "connect.php";

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $nameaddition = $_POST['nameaddition'];

    $company = $_POST['company'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phonenumber = $_POST['phonenumber'];
    $streetname = $_POST['streetname'];
    $housenumber = $_POST['housenumber'];
    $houseaddition = $_POST['houseaddition'];
    $zipcode = $_POST['zipcode'];
    $placename = $_POST['placename'];

    $query = "SELECT * FROM " . DB_PREFIX . "users WHERE username = '".$username."'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

// als bepaalde dingen al bezet zijn, krijgt de user een error

    if ($data[0] > 1)
    {
        echo "Dat account bestaat al!";
    }
    else
    {
        $query = "INSERT INTO " . DB_PREFIX . "users (username, password, firstname, lastname, gender, nameaddition, company, email, age, phonenumber, streetname, housenumber, houseaddition, zipcode, placename)
               VALUES ('$username', '$password', '$firstname', '$lastname', '$gender', '$nameaddition', '$company', '$email', '$age', '$phonenumber', '$streetname', '$housenumber', '$houseaddition', '$zipcode', '$placename')";
        mysqli_query($conn, $query);

    header("location: login.php");

    }

}

mysqli_close($conn);

?>