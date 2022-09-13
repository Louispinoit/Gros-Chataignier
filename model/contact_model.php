<?php


if (!empty($_POST)) {

    $firstname = htmlentities($_POST["firstname"]);
    $name= htmlentities($_POST["name"]);
    $mail =  htmlentities($_POST["mail"]);
    $text = htmlentities($_POST["text"]);

    $user = new Users("",$mail,$name, $firstname);
    $user->sendMessage($text);

}