<?php 
class Product {
    public function __construct(){
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }


    public function show(){
        $stmt = $this->db->prepare("SELECT * FROM classicmodels.products");
        if($stmt->execute()){

        }
    }

    public function add(){
        $stmt = $this->connect()->prepare("SELECT * FROM classicmodels.products");
    }

    public function delete(){
        
    }

    public function edit(){
        
    }
}

// $sql = "SELECT * FROM classicmodels.products";    

// // Förbered förfrågan till databasen
// $stmt = $conn->prepare($sql);

// // Skickar förfrågan till databasen
// $select = $stmt->execute();

// $sql = "UPDATE classicmodels.products
//     SET 
//     productName=:productName,
//     productLine=:productLine,
//     productVendor=:productVendor,
//     productDescription=:productDescription,
//     quantityInStock=:quantityInStock,
//     buyPrice=:buyPrice,
//     MSRP=:MSRP
//     WHERE productCode=:productCode";

// $stmt = $conn->prepare($sql);

// $update = $stmt->execute([
//     ":productCode" => $productCode, 
//     ":productName" => $productName, 
//     ":productLine" => $productLine,
//     ":productVendor" => $productVendor,
//     ":productDescription" => $productDescription,
//     ":quantityInStock" => $quantityInStock,
//     ":buyPrice" => $buyPrice,
//     ":MSRP" => $MSRP]);