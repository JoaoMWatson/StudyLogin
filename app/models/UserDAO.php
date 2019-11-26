<?php

require "/home/useless_guy/git/StudyLogin/config/config.php";

class UserDAO{
    public $idPessoa;
    public $nome;
    public $email;
    public $senha;

    private $connection;

    function __construct() {
        $this->connection = mysqli_connect(DB_SERVER, DB_USER, 
                                           DB_PASS, DB_NAME);
    }

    public function cadastro($pass, $checkPass){
        session_start();
        if($pass == $checkPass){

            $sql = "INSERT INTO pessoa VALUES (0, '$this->nome', $this->email', 
            md5('$this->senha'))";

            $rs = $this->connection->query($sql);

            if($rs){
                header("Location: /login");
                $_SESSION["success"] = "Cadastrado com sucesso";
            }
            else{
                echo $this->connection->error;
            }
        }
        else{
            $_SESSION["danger"] = "senhas não coincidem";
            header("Location: /cadastro");
        }
    }

    public function logar(){
        $sql = "SELECT * FROM pessoa WHERE email='$this->email' AND senha=md5('$this->senha')";
        $rs = $this->connection->query($sql);

        if ($rs->num_rows > 0){
            session_start();
            $_SESSION["logado"] = true;
            header("Location: /main_page");
        }
        else{
            header("Location: /login");
        }
    }


}

?>