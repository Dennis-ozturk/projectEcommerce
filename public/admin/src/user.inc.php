<?php 
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function getAllUsers($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE username = :username AND pass = :pass");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $password, PDO::PARAM_STR);
        if ($stmt->execute() && $stmt->fetchColumn()) {
            $_SESSION['admin'] = $username;
            header('location: dashboard.php');
        } else { ?>
        <p class="error">Try Again!</p>
<?php 
}
}

public function exit()
{
    unset($_SESSION["admin"]);
    session_destroy();
    header("Location: index.php");
}
}
