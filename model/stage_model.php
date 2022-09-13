<?php


function renderHtml() {
    $db = new Stage;
    $html = '';
    $db->stageFilter();
    foreach ($db->query as $value) {
        
             foreach ($value as $msg) {
                $html  = '<div class="stage">'
                     . $msg . '</div>';
            echo $html;
        }
        echo '<br>';
    }
}

