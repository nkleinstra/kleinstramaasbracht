<?php

session_start();

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
            <div class="contact">

                <?php if(!empty($errors)): ?>
                <div class="panel">
                    <ul><li><?php echo implode('</li><li>',$errors) ?></li></ul>
                </div>
                <?php endif; ?>
                <form class="content" action="contact.php" method="post">
                    <label>
                        Je naam
                    </label>
                    <input type="text" name="naam" autocomplete="off" placeholder="Je Naam *"<?php echo isset($fields['naam']) ? 'value="' . e($fields['naam']) . '"' : '' ?>>

                    <label>
                        Je email adres
                    </label>
                    <input type="text" name="email" autocomplete="off" placeholder="Je email adres *"<?php echo isset($fields['email']) ? 'value="' . e($fields['email']) . '"' : '' ?>>

                    <label>
                        Je bericht
                    </label>
                    <textarea name="bericht" rows="8" placeholder="Type hier je bericht *"><?php echo isset($fields['bericht']) ? e($fields['bericht']) : '' ?></textarea>

                <input type="submit" value="Send">

                <p class="muted">Velden met een * mogen niet leeg blijven.</p>

                </form>
            </div>
    </body>
</html>

<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);

?>