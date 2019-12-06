<?php

require_once("/home/useless_guy/git/StudyLogin/app/models/UserDAO.php");
require_once("/home/useless_guy/git/StudyLogin/app/models/UserModel.php");

$action = $_GET["action"];


switch($action){

    case "register":
        $userModel = new UserModel();
        $userModel->nome = $_POST["name"];
        $userModel->email = $_POST["email"];
        $userModel->senha = $_POST["pass"];

        $checkPass = $_POST["checkPass"];

        $verifyMail = $userModel->verifyMail();

        if(md5($userModel->senha) === md5($checkPass)){
            if($verifyMail === false){
                $_SESSION["danger"] = "Email ja cadastrado";
                header("Location: /cadastro");
            break;
            }
            else{
                $userModel->cadastro();
                $userModel->sendAccountVerification($userModel->email);
            }
        }
        else{
            $_SESSION["danger"] = "senhas não coincidem";
            header("Location: /cadastro");
        }
    break;


    case 'login':
        $user = new UserDAO();
        $user->email = $_POST["email"];
        $user->senha = $_POST["pass"];

        $user->login();
    break;

    case 'verifyCode':
        $user = new UserDAO();
        $user->code = $_POST["code"];

        $confirmCode = $user->verifyCode();

        if($confirmCode === true){
            $user->confirmAccount();
        }else{
            $_SESSION["danger"] = "Codigo incorreto";
            header("Location: /verificar_conta");
        }
}

?>