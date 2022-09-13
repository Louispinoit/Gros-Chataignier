<?php

if (!empty($_POST)) {

    $password = htmlentities($_POST["password"]);
    $name = htmlentities($_POST["name"]);
    $firstname = htmlentities($_POST["firstname"]);
    $mail =  htmlentities($_POST["mail"]);

    $test = new Users($password, $mail, $name, $firstname);
    $test->checkValue();
}
