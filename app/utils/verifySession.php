<?php

session_start();
if(!isset($_SESSION) || !isset($_SESSION["logado"])){
    header("Location: /");
    exit();
}


?>