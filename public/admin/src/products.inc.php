<?php 
class Product {
    public function __construct(){
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function getProducts(){
        $stmt = $this->db->prepare("SELECT * FROM classicmodels.products");
        if($stmt->execute()){
            if($stmt->rowCount() > 0){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $data[] = $row;
                }
                return $data;
            }
        }
    }
    
    public function selectOneProduct($productCode){
        $stmt = $this->db->prepare("SELECT * FROM classicmodels.products WHERE productCode = :productCode");
        $stmt->bindValue(":productCode", $productCode);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function edit($fields, $productCode){
        try{
            $stmt = $this->db->prepare("UPDATE classicmodels.products SET productName = :productName, productDescription = :productDescription, buyPrice = :buyPrice WHERE productCode = :productCode");
            $stmt->bindValue(':productName', $fields[0]);
            $stmt->bindValue(':productDescription', $fields[1]);
            $stmt->bindValue(':buyPrice', $fields[2]);
            $stmt->bindValue(':productCode', $productCode);
            
            if($stmt){
                $stmt->execute();
                header('Location: products.php');
            }
        }catch(PDOException $e){
            echo($e->getMessage());
        }
    }

    public function delete(){
        
    }

}