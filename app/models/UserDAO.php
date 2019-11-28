<?php

require "/home/useless_guy/git/StudyLogin/config/config.php";

class UserDAO{
    public $idPessoa;
    public $nome;
    public $email;
    public $senha;
    public $checkPass;

    private $connection;

    function __construct() {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, 
                                           DB_PASS, DB_NAME);
    }

    public function cadastro($pass, $checkPass){
        session_start();

        if(md5($pass) === md5($checkPass)){
            $sql = "INSERT INTO pessoa VALUES(0, '$this->nome', '$this->email', md5('$pass'))";
            $rs = $this->connection->query($sql);
            if($rs){
                $_SESSION["success"] = "Cadastrado com sucesso";
                header("Location: /login");
            }

            else{
                $_SESSION["danger"] = "erro ao cadastrar usuario";
                header("Location: /cadastro");
            }

        }else{
            $_SESSION["danger"] = "senhas não coincidem";
            header("Location: /cadastro");
        }
    }

    public function login(){
        $sql = "SELECT * FROM pessoa WHERE email='$this->email' AND senha=md5('$this->senha')";
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

}

?>