<?php

if(!isset($_SERVER["PATH_INFO"])){
    require "/home/useless_guy/git/StudyLogin/app/views/login.php";
    exit();
}

switch($_SERVER["PATH_INFO"]){
    case "/login":
    case "/":
        require "/home/useless_guy/git/StudyLogin/app/views/login.php";
    break;

    case "/cadastro":
    case "/cadastrar":
        require "/home/useless_guy/git/StudyLogin/app/views/cadastro.php";
    break;

    case "/main_page";
    case "/principal";
        require "/home/useless_guy/git/StudyLogin/app/views/mainPage.php";
    break;

    case "/verificar_conta":
        require "/home/useless_guy/git/StudyLogin/app/views/verifyAccount.php";
    break;

    case "/mudar_senha":
        require "/home/useless_guy/git/StudyLogin/app/views/mudarSenha.php";
    break;

    
    default:
        echo "Sorry dude";
}

?>