<?php 
class Product
{
    private $db;
    public function __construct()
    {
        $this->db = new Dbh();
        $this->db = $this->db->connect();
    }

    public function createProduct($fields)
    {
        $stmt = $this->db->prepare("INSERT INTO products
        (productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)
        VALUES (:productName, :productLine, :productScale, :productVendor, :productDescription, :quantityInStock, :buyPrice, :MSRP)");

        foreach ($fields as $key => $value) {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }

        $stmt->execute();
       
    }

    public function getProducts()
    {
        $stmt = $this->db->prepare("SELECT * FROM products");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }

    public function selectOneProduct($productCode)
    {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE productCode = :productCode");
        $stmt->bindValue(":productCode", $productCode, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function edit($fields)
    {
        try {
            $stmt = $this->db->prepare("UPDATE products SET productName = :productName, productDescription = :productDescription, buyPrice = :buyPrice WHERE productCode = :productCode");
            foreach($fields as $key => $value){
                if($key == ':buyPrice' || $key == ':productCode'){
                    $stmt->bindValue($key, $value, PDO::PARAM_INT);
                }
                $stmt->bindValue($key, $value, PDO::PARAM_STR);
            }

            if ($stmt) {
                $stmt->execute();
                header('Location: products.php');
            }
        } catch (PDOException $e) {
            echo ($e->getMessage());
        }
    }

    public function delete($productCode)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM products WHERE productCode = :productCode");
            $result = $stmt->execute(["productCode" => $productCode]);
            if ($result) {
                header('Location: products.php');
            }
        } catch (PDOException $e) {
            echo ($e->getMessage());
        }
    }
}
