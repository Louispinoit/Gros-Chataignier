<?php

if (!empty($_POST["first-password"]) && !empty($_POST["new-password"]) && !empty($_POST["repeat-password"])) {

    $firstpass = htmlentities($_POST["first-password"]);
    $newpassword = htmlentities($_POST["new-password"]);
    $repeatpassword = htmlentities($_POST["repeat-password"]);
    $mail = $_SESSION['mail'];
    $password = $_SESSION['password'];
    $user = new Users($password, $mail);
    $user->changePassword($firstpass, $newpassword, $repeatpassword);
}
