<?php


$db = new Stage;

function renderOption() {
    $db = new Stage;
    $html = '';
    $db->getCategory();
    foreach ($db->query as $categories) {
         extract($categories);
         $html  = '<option value='
                     . $id . '>'. $title . '</option>';
            echo $html;
        }

}

if (!empty($_POST)) {

    $categories = htmlentities($_POST["categories"]);
    $description = htmlentities($_POST["description"]);
    $date = htmlentities($_POST["date"]);
    $starttime =  htmlentities($_POST["start-time"]);
    $endtime =  htmlentities($_POST["end-time"]);

    $stage = new Stage($categories, $description, $date, $starttime, $endtime);
    $stage->addStage();
}
