<?php
session_start();
function showAlerts($type){
    if (isset($_SESSION[$type])){
        echo "<div class='alert alert-$type'>";
            echo $_SESSION[$type];
        echo "</div>";

        unset($_SESSION[$type]);
    }
}

?>