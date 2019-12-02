<?php

include("/home/useless_guy/git/StudyLogin/app/models/UserDAO.php");
include("/home/useless_guy/git/StudyLogin/app/models/UserModel.php");

$action = $_GET["action"];


switch($action){

    case "register":
        $user = new UserDAO();
        $user->nome = $_POST["name"];
        $user->email = $_POST["email"];
        $user->senha = $_POST["pass"];
        $checkPass = $_POST["checkPass"];

        $verifyMail = $user->verifyMail();

        if(md5($user->senha) === md5($checkPass)){
            if($verifyMail === false){
                $_SESSION["danger"] = "Email ja cadastrado";
                header("Location: /cadastro");
            break;
            }
            else{
                $sendMail = new UserModel();
                $user->cadastro();
                $sendMail->sendAccountVerification($user->email);
            }
        }
        else{
            $_SESSION["danger"] = "senhas não coincidem";
            header("Location: /cadastro");
        }
    break;

    case 'login':
        $user = new UserDAO;
        $user->email = $_POST["email"];
        $user->senha = $_POST["pass"];

        $user->login();
    break;
}

?>