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
        $msg = "Seu codigo é $code 
        Copie e cole seu codigo no link a seguir para validar sua conta 
        <a>localhost:8080/verificar_conta"."</a>";
        $headers = "From: noreplay @ PyQuest . com";
        try {
            mail("$to_email", "$subject", "$msg", "$headers");
        } catch (ErrorException $th) {
            $_SESSION["danger"] = "Erro ao enviar email";
            header("Location: /verificar_conta");
        }
        

    }
}
?>