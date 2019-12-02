<?php

require_once "UserDAO.php";

class UserModel extends UserDAO{

    public function generateMailCode(){
        $time_now = time();
        $code = $time_now/1000 * 0.7;
        return intval($code);
    }

    public function sendAccountVerification($mail){
        $code = $this->generateMailCode();
        $to_email = $mail;
        $subject = "Codigo de Verificação";
        $msg = "Seu codigo é $code";
        $headers = "From: noreplay @ PyQuest . com";

        mail("$to_email", "$subject", "$msg", "$headers");
    }
}
?>