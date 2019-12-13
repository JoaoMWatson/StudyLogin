<?php

require_once "/home/useless_guy/git/StudyLogin/config/config.php";
require_once "UserModel.php";

class UserDAO{
    public $idPessoa;
    public $nome;
    public $email;
    public $senha;
    
    public $code;

    public $connection;

    function __construct() {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, 
                                           DB_PASS, DB_NAME);
    }

    public function cadastro(){
        $userModel = new UserModel();
        $code = $userModel->generateMailCode();
        $sql = "INSERT INTO pessoa VALUES(0, '$this->nome', '$this->email', md5('$this->senha'), '$code', 0)";
        $rs = $this->connection->query($sql);

        if($rs){
            return true;
            header("Location: /login");
        }
        else{
            $_SESSION["danger"] = "erro ao cadastrar usuario";
            header("Location: /cadastro");
        }
    }

    public function login(){
        $sql = "SELECT * FROM pessoa WHERE email='$this->email' AND senha=md5('$this->senha') AND confirmado=1";
        $rs = $this->connection->query($sql);
        
        session_start();
        if ($rs->num_rows > 0){
            $_SESSION["logado"] = true;
            header("Location: /main_page");
        }
        else{
            $_SESSION["danger"] = "Email ou senha incorretos";
            header("Location: /login");
        }
    }

    public function verifyMail(){
        $sql = "SELECT * FROM pessoa WHERE email='$this->email'";
        $rs = $this->connection->query($sql);
        
        session_start();
        if ($rs->num_rows > 0){
            return false;
        }else{
            return true;
        }
    }

    public function verifyCode(){
        $sql = "SELECT * FROM pessoa WHERE codigo='$this->code'";
        $rs = $this->connection->query($sql);

        session_start();
        if ($rs->num_rows > 0)
            return true;
        else 
            return false;
    }

    public function confirmAccount(){
        $sql = "UPDATE pessoa SET confirmado = 1";
        $rs = $this->connection->query($sql);

        session_start();
        if($rs){
            $_SESSION["success"] = "Email confirmado com sucesso";
            header("Location: /login");
        }else{
            header("Location: /verificar_conta");
        }
    }

}

?>