<?php

require_once "/home/useless_guy/git/StudyLogin/config/config.php";
require_once "UserModel.php";

/**
 * Data Access Object a class to interact with database
 */
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

     /**
     * verify if the email exist in database.
     * 
     * @return bool
     */
    public function verifyMail(){
        $sql = "SELECT * FROM pessoa WHERE email='$this->email'";
        $rs = $this->connection->query($sql);
        
        session_start();
        if ($rs->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * register the user in system.
     * 
     * @return bool
     */
    public function register(){
        $userModel = new UserModel();
        $code = $userModel->generateMailCode();

        $sql = "INSERT INTO pessoa VALUES(0, '$this->nome', '$this->email', md5('$this->senha'), '$code', 0)";
        $rs = $this->connection->query($sql);

        if($rs){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * sing-in the user in the system.
     * 
     * @return bool
     */
    public function login(){
        $sql = "SELECT * FROM pessoa WHERE email='$this->email' AND senha=md5('$this->senha') AND confirmado=1";
        $rs = $this->connection->query($sql);
        
        session_start();
        if ($rs->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }


    /**
     * verify if the code exist in database.
     * 
     * @return bool
     */
    public function verifyCode(){
        $sql = "SELECT * FROM pessoa WHERE codigo='$this->code'";
        $rs = $this->connection->query($sql);

        session_start();
        if ($rs->num_rows > 0)
            return true;
        else 
            return false;
    }

    /**
     * update the status of the user in database to "confirmado"
     * 
     * @return bool
     */
    public function confirmAccount(){
        $sql = "UPDATE pessoa SET confirmado = 1";
        $rs = $this->connection->query($sql);

        session_start();
        if($rs){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Update the password of the user if id exists 
     * 
     * @param idPessoa the id of user in database.
     * 
     * @return bool
     */
    public function updatePassword($idPessoa){
        $sql = "UPDATE pessoa SET senha WHERE idPessoa=$idPessoa";
        $rs = $this->connection->query($sql);
        
        if ($rs->num_rows > 0)
            return true;
        else 
            return false;
    }

    /**
     * get the code for user to reesend email
     * 
     * 
     */

    public function getCode($email){
        $sql = "SELECT codigo FROM pessoa WHERE email='$email'";
        $rs = $this->connection->query($sql);
        $list = [];

        while($line = $rs->fetch_assoc()){
           $list[] = $line['codigo'];
        }
        $code = $list[0];
        return $code;
    }

}

?>