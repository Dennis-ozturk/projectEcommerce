<?php 
class User{
    private $db;
    public function __construct(){
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function getAllUsers($username, $password){
        $stmt = $this->db->prepare("SELECT * FROM classicmodels.admin");
        if($stmt->execute()){
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['username'] == $username){
                    if($row['password'] == $password){
                        echo("Found User");
                        $_SESSION['admin'] = $username;
                        header('Location: dashboard.php');
                    }
                }else{
                    echo("<h1>Try Again</h1>");
                }
            }
        }
    }

    public function exit(){
        unset($_SESSION["admin"]);
        header("Location: index.php");
        session_destroy();
    }
}