<?php 
class Order {
    private $db;
    public function __construct(){
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function createOrder($fields){
        $stmt = $this->db->prepare("INSERT INTO classicmodels.orders 
        (orderNumber, orderDate, requiredDate,shippedDate, `status`, comments, customerNumber)
        VALUES (?,?,?,?,?,?,?)");
        $answer = $stmt->execute([$fields[0],$fields[1],$fields[2],$fields[3],$fields[4],$fields[5],$fields[6]]);
    }

    public function getOrders(){
        $stmt = $this->db->prepare("SELECT * FROM classicmodels.orders");
        if($stmt->execute()){
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $data[] = $row;
                }
                return $data;
            }
        }
    }
    
    public function selectOneOrder($orderNumber){
        $stmt = $this->db->prepare("SELECT * FROM classicmodels.orders WHERE orderNumber = :orderNumber");
        $stmt->bindValue(":orderNumber", $orderNumber, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function edit($fields, $orderNumber){
        try{
            $stmt = $this->db->prepare("UPDATE classicmodels.orders SET orderDate = :orderDate, comments = :comments, customerNumber = :customerNumber WHERE orderNumber = :orderNumber");
            $stmt->bindValue(':orderDate', $fields[0], PDO::PARAM_STR);
            $stmt->bindValue(':comments', $fields[1], PDO::PARAM_STR);
            $stmt->bindValue(':customerNumber', $fields[2], PDO::PARAM_INT);
            $stmt->bindValue(':orderNumber', $orderNumber, PDO::PARAM_STR);
            
            if($stmt){
                $stmt->execute();
                header('Location: orders.php');
            }
        }catch(PDOException $e){
            echo($e->getMessage());
        }
    }

    public function delete($orderNumber){
        try{
            $stmt = $this->db->prepare("DELETE FROM `classicmodels`.`orderdetails` WHERE orderNumber = ".$orderNumber);
            $result = $stmt->execute();
            $stmt = $this->db->prepare("DELETE FROM `classicmodels`.`orders` WHERE orderNumber = ".$orderNumber);
            $result2 = $stmt->execute();
            if($result && $result2){
                header('Location: orders.php');
            }else {?>
                <p class="alert alert-warning">Try Again</p>
            <?php }
        }catch(PDOException $e){
            echo($e->getMessage());
        }
    }   

}