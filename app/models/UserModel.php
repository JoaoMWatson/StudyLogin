<?php

require_once "UserDAO.php";
require_once "/home/useless_guy/git/StudyLogin/vendor/autoload.php";
require_once "/home/useless_guy/git/StudyLogin/config/config.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/** 
 * extends UserDAO, function without database interaction.
 * */
class UserModel extends UserDAO{

    /**
     * Return an random number based in a mathematic equation. 
     * 
     * @return int
     */
    public function generateMailCode(){
        $time_now = time();
        $code = $time_now/1000 * 0.8 - 350;
        return intval($code);
        
    }


    /**
     * Use to send email before the register in system.
     * 
     * Using the module PHPMailer to send emails with a veryfication code
     * using gmail server in my personal account created for this project
     * utf-8 enconding, port 587, Secure TSL.
     * 
     * 
     * @param string $email the recipient email address .
     * @param string $name name of the user.
     * 
     */
    public function sendVerifyEmail($email, $name = ""){
        header('Content-Type: text/html; charset=utf-8');
        $mail = new PHPMailer(true);

        if($name == "")
            $code = $this->getCode($email);
        else
            $code = $this->generateMailCode();
        
        try{
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
            Acesse <a href="http://localhost:8080/verificar_conta"> Verificar Conta</a> 
            e digite seu codigo';

            $mail->send();
            return true;

        }catch(Exception $e){
            return false;
        }
    }

}
?>