<?php

include("/home/useless_guy/git/StudyLogin/app/models/UserDAO.php");

$action = $_GET["action"];

switch($action){
    
    case "register":
        $user = new UserDAO;
        $user->nome = $_POST["name"];
        $user->email = $_POST["email"];
        $user->senha = $_POST["pass"];
        $checkPass = $_POST["checkPass"];

        $user->cadastro($user->senha, $checkPass);
    break;

    case 'login':
        $user = new UserDAO;
        $user->email = $_POST["email"];
        $user->senha = $_POST["pass"];

        $user->login();
    break;
}

?>