<?php 
class Customer
{
    private $db;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function getAllCustomers()
    {
        $stmt = $this->db->prepare("SELECT * FROM users");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
            $result = $stmt->execute([':id' => $id]);

            if($result){
            }else {
                echo("Not deleted");
            }
        } catch (PDOException $e) {
            echo ($e->getMessage());
        }
    }
}

