<?php 
class Product {
    public function __construct(){
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function createProduct($fields){
        $stmt = $this->db->prepare("INSERT INTO classicmodels.product 
        (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)
        VALUES (:productCode, :productName, :productLine, :productScale, :productVendor, :productDescription, :quantityInStock, :buyPrice, :MSRP)");
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
        $stmt->bindValue(":productCode", $productCode, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function edit($fields, $productCode){
        try{
            $stmt = $this->db->prepare("UPDATE classicmodels.products SET productName = :productName, productDescription = :productDescription, buyPrice = :buyPrice WHERE productCode = :productCode");
            $stmt->bindValue(':productName', $fields[0], PDO::PARAM_STR);
            $stmt->bindValue(':productDescription', $fields[1], PDO::PARAM_STR);
            $stmt->bindValue(':buyPrice', $fields[2], PDO::PARAM_INT);
            $stmt->bindValue(':productCode', $productCode, PDO::PARAM_STR);
            
            if($stmt){
                $stmt->execute();
                header('Location: products.php');
            }
        }catch(PDOException $e){
            echo($e->getMessage());
        }
    }

    public function delete($productCode){
        try{
            $stmt = $this->db->prepare("DELETE FROM products WHERE productCode = :productCode");
            $result = $stmt->execute(["productCode" => $productCode]);
            if($result){
                header('Location: products.php');
            }else {?>
                <p class="alert alert-warning">Try Again</p>
            <?php }
        }catch(PDOException $e){
            echo($e->getMessage());
        }
    }   

}