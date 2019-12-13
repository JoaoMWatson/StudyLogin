<?php

require_once "UserDAO.php";
require_once "/home/useless_guy/git/StudyLogin/config/vendor/autoload.php";
require_once "/home/useless_guy/git/StudyLogin/config/config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UserModel extends UserDAO{

    public function generateMailCode(){
        $time_now = time();
        $code = $time_now/1000 * 0.9;
        return intval($code);
        /**
         * Return an random number based in a mathematic equation. 
         */
    }

    public function sendVerifyCode($email, $name){
        $mail = new PHPMailer(true);
        $code = $this->generateMailCode();
        try{
            $mail->Encoding = "base64";
            $mail->isSMTP();
            $mail->SMTPDebug = 2;
            $mail->Port = 587; 
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = GMAIL_USER;
            $mail->Password = GMAIL_PASS;
            $mail->SMTPSecure = 'tls';

            $mail->setFrom(GMAIL_USER, "Watson's Production");
            $mail->addAddress("$email", "$name");

            $mail->isHTML(true);
            $mail->Subject = "Confirmação de conta";
            $mail->Body = 'Olá '.$name.' <b>Seu codigo é '.$code.'.</b><br>
            Acesse <a href="localhost:8080/verificar_conta">verificar_conta</a> e digite seu codigo';

            $mail->send();
            $_SESSION["success"] = "Cadastro efetuado com sucesso,
            você receberá um codigo por email, 
            verifique na sua caixa de span";
        }catch(Exception $e){
            $_SESSION["danger"] = "Erro ao enviar email".$mail->ErrorInfo;
        }

        /** Send email to user  */
    }

}
?>