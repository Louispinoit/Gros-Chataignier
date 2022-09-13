<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La ferme du gros chataigner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css " type="text/css" />
    <link rel="stylesheet" href="./css/style.css" type="text/css" />
</head>

<body>
    <?php

    if (isset($_GET['page'])) {

        if ($_GET['page'] === "home") {
            require "./controller/home_controller.php";
        }

        if ($_GET['page'] === "inscription") {
            require "./controller/inscription_controller.php";
        }

        if ($_GET['page'] === "connection") {
            require "./controller/login_controller.php";
        }

        if ($_GET['page'] === "connected") {
            require "./controller/connected_controller.php";
        }

        if ($_GET['page'] === "disconnect") {
            require "./controller/disconnect_controller.php";
        }

        if ($_GET['page'] === "vegetables") {
            require "./controller/vegetables_controller.php";
        }
        
        if ($_GET['page'] === "activites") {
            require "./controller/activites_controller.php";
        }

        if ($_GET['page'] === "potager") {
            require "./controller/potager_controller.php";
        }

        if ($_GET['page'] === "osiericulture") {
            require "./controller/osiericulture_controller.php";
        }

        if ($_GET['page'] === "vannerie") {
            require "./controller/vannerie_controller.php";
        }
        if ($_GET['page'] === "fournil") {
            require "./controller/fournil_controller.php";
        }
        if ($_GET['page'] === "stage") {
            require "./controller/stage_controller.php";
        }
        
        if ($_GET['page'] === "contact") {
            require "./controller/contact_controller.php";
        }

        if ($_GET['page'] === "admin") {
            require "./controller/admin_controller.php";
        }
    } else if (isset($_GET['reg_err'])) {
        require "./controller/inscription_controller.php";
    } else if (isset($_GET['login_err'])) {
        require "./controller/login_controller.php";
    } else if (isset($_GET['password_err'])) {
        require "./controller/connected_controller.php";
    } else if (isset($_GET['posting'])) {
        require "./controller/admin_controller.php";
    } else if (isset($_GET['contact_msg'])) {
        require "./controller/contact_controller.php";
    } else {
        require "./controller/loading-screen_controller.php";
    }


    ?>



    <script  src="./js/accessibilty.js"></script>

</body>

</html>