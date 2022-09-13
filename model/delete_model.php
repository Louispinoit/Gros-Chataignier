<?php

if (isset($_POST["button-delete"])) {

    $mail = $_SESSION["mail"];
    $user = new Users($password = "null", $mail);
    $user->deleteAccount();
}
