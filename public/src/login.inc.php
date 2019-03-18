<?php 
class User {
    private $db;
    public function __construct(){
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function logIn($username, $password){
        $stmt = $this->db->prepare("SELECT * FROM classicmodels.admin WHERE username = :username AND pass = :pass");
        if($stmt->execute([':username' => $username, ':pass' => $password]) && $stmt->fetchColumn()){
            $_SESSION['admin'] = $username;
            header('location: dashboard.php');
        }else {?>
            <h1>Try again!</h1>
        <?php }
        
    }

    public function getUsers($username, $password){
        $stmt = $this->db->prepare("SELECT * FROM classicmodels.users WHERE username = :username AND `password` = :pass");
        if($stmt->execute([':username' => $username, ':pass' => $password]) && $stmt->fetchColumn()){
            $_SESSION['user'] = $username;
            header('location: index.php');
        }else {?>
            <h1>Try again!</h1>
        <?php }
    }

    public function exit(){
        unset($_SESSION["admin"]);
        session_destroy();
        header("Location: index.php");
    }
}