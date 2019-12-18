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

        if(md5($checkPass) === md5($userModel->senha)){
            if($verifyMail === false){
                $userModel->register();
                if ($userModel->sendVerifyEmail($userModel->email, $userModel->nome) == true){
                    $_SESSION["success"] = 'Cadastro efetuado com sucesso,
                        você receberá um codigo por email. 
                        Caso não tenha recebido <a href="http://localhost:8080/reenviar_email">Clique aqui</a>
                        para que possamos reenviar o seu codigo';
                    header("Location: /cadastro");
                }else{
                    $_SESSION["danger"] = "Erro ao enviar email".$mail->ErrorInfo;
                }
            }else{
                $_SESSION["danger"] = "Email já cadastrado";
                header("Location: /cadastro");
            }
        }else{
            $_SESSION["danger"] = "Senhas não coincidem";
            header("Location: /cadastro");
        }

    break;


    case 'login':
        $user = new UserModel();
        $user->email = $_POST["email"];
        $user->senha = $_POST["pass"];

        if($user->login()){
            $_SESSION["logado"] = true;
            header("Location: /main_page");
        }else{
            $_SESSION["danger"] = 'Email ou senha incorretos';
            header("Location: /login");
        }

    break;

    case 'verifyCode':
        $userModel = new UserModel();
        $userModel->code = $_POST["code"];

        $confirmCode = $userModel->verifyCode();

        if($confirmCode === true){
            if($userModel->confirmAccount()){
                $_SESSION["success"] = "Email confirmado com sucesso";
                header("Location: /login");
            }else{
                $_SESSION["danger"] = "Erro ao verificar conta";
                header("Location: /verificar_conta");
            }
        }else{
            $_SESSION["danger"] = "Codigo incorreto";
            header("Location: /verificar_conta");
        }
    break;

    case 'resendMail':
        $userModel = new UserModel();
        $userModel->email = $_POST["mail"];

        session_start();
        if($userModel->sendVerifyEmail($userModel->email)){
            $_SESSION["success"] = "Email enviado novamente, favor checar caixa de span";
            header("Location: /cadastro");
        }else{
            $_SESSION["danger"] = "Erro ao reenviar email";
            header("Location: /cadastro");
        }
        
    break;

    case 'updatePassword':
        $userModel = new UserModel();
        $email = $_POST["email"];

        session_start();
        if($userModel->sendChangePassEmail($email)){
            $_SESSION["success"] = "Email enviado com sucesso!";
            header("Location: /login");
        }else{
            $_SESSION["danger"] = 'Erro ao enviar email';
            header("Location: /login");
        }
    break;

}
