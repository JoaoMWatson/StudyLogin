<?php

if(!isset($_SERVER["PATH_INFO"])){
    require "../StudyLogin/app/views/login.php";
    exit();
}

switch($_SERVER["PATH_INFO"]){
    case "/login":
    case "/":
        require "../StudyLogin/app/views/login.php";
    break;

    case "/cadastro":
    case "/cadastrar":
        require "../StudyLogin/app/views/register.php";
    break;

    case "/main_page";
    case "/principal";
        require "../StudyLogin/app/views/mainPage.php";
    break;

    case "/verificar_conta":
        require "../StudyLogin/app/views/verifyAccount.php";
    break;

    case "/mudar_senha":
        require "../StudyLogin/app/views/changePass.php";
    break;

    
    default:
        echo "Sorry dude";
}

?>