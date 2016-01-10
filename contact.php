<?php

session_start();

require_once 'libs/PHPMailerAutoload.php';

$errors = [];

if(isset ($_POST['naam'], $_POST['email'], $_POST['bericht'])) {
    echo 'All set';

    $fields = [
        'naam' => $_POST['naam'],
        'email' => $_POST['email'],
        'bericht' => $_POST['bericht']
    ];

    foreach($fields as $field => $data) {
        if (empty($data)) {
            $errors[] = 'Het ' . $field . ' veld is verplicht';
        }
    }

    if(empty($errors)) {

        $m= new PHPMailer;

        $m->isSMTP();
        $m->SMTPAuth = true;

        $m->SMTPDebug = 1;

        $m->Host = 'smtp.gmail.com';
        $m->Username ='kleinstraenzonen@gmail.com';
        $m->Password ='kleinstraenzonen11';
        $m->SMTPSecure ='ssl';
        $m->Port = 465;

        $m->isHTML();

        $m->Subject ='Contact form submitted';
        $m->Body ='From: ' . $fields['naam'] . ' (' . $fields['email'] . ')<p>' . $fields['bericht'] . '</p>';

        $m->FromName ='Contact';
        $m->AddAddress('kleinstraenzonen@gmail.com', 'Kleinstra en Zonen');

        if($m->send()){
            header('Location: thanks.php');
            die();
        } else {
            $errors[] = 'Sorry, email kon niet verstuurd worden, probeer het later opnieuw.';
        }
    }


} else {
    $errors[] = 'Er ging iets fout.';
}

$_SESSION['errors'] =$errors;
$_SESSION['fields'] =$fields;

header('Location: contactform.php');