<?php 
class User extends Dbh{
    public function getAllUsers($username, $password){
        $stmt = $this->connect()->prepare("SELECT * FROM classicmodels.admin");
        $stmt->execute();
        if($stmt->rowCount() > 1){
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