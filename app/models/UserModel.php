<?php

require_once "UserDAO.php";

class UserModel extends UserDAO{

    public function generateMailCode(){
        $time_now = time();
        $code = $time_now/1000 * 0.9;
        return intval($code);
    }

    public function sendAccountVerification($mail){
        $code = $this->generateMailCode();

        $to_email = $mail;
        $subject = "Codigo de Verificação";
        $headers = "From: noreplay @ PyQuest . com";

        $msg = '<html><body>';
        $msg .= '<h1 style="color: #2295f7;">Seu codigo é'.$code.'</h1>';
        $msg .= 'Copie e cole seu codigo no link a seguir para validar sua conta';
        $msg .= '<a>localhost:8080/verificar_conta</a>';
        
        try {
            mail("$to_email", "$subject", "$msg", "$headers");
        } catch (ErrorException $th) {
            $_SESSION["danger"] = "Erro ao enviar email";
            header("Location: /verificar_conta");
            return false;
        }
    }

    public function sendPasswordUpdate($email){
        $code = $this->getPassword($email);

        $to_email = $email;
        $subject = "Mudança de senha";
        $msg = "Para mudar a senha entre nesse link localhost:8080/$code";
    }
}
?>