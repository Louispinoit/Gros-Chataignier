<?php


if (!empty($_POST)) {

    $password = htmlentities($_POST["password-login"]);
    $mail =  htmlentities($_POST["mail-login"]);
    
    $user = new Users($password, $mail);
    $user->checkAccount();

}