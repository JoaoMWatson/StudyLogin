<?php

if(!isset($_SERVER["PATH_INFO"])){
    require "/home/useless_guy/git/StudyLogin/app/views/login.php";
    exit();
}

switch($_SERVER["PATH_INFO"]){
    case "/login":
        require "/home/useless_guy/git/StudyLogin/app/views/login.php";
        break;

    case "/esqueci_minha_senha":
    case "/recuperar_senha": 
        require "/home/useless_guy/git/StudyLogin/app/views/recuperaSenha.php";
        break;

    case "/cadastro":
    case "/cadastrar":
        require "/home/useless_guy/git/StudyLogin/app/views/cadastro.php";
        break;

    default:
        echo "Sorry dude";
}

?>