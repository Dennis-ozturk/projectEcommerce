<?php
require_once("../db/Database.php");

class Product {
    public $code = false;
    public $name;
    public $line;
    public $scale;
    public $vendor;
    public $description;
    public $quantityInStock;
    public $buyPrice;
    public $MSRP;

    function __construct($code) {
        $this->code = $code;
        $this->read_from_db();
    }

    private function read_from_db() {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('
            SELECT
                productName,
                productLine,
                productScale,
                productVendor,
                productDescription,
                quantityInStock,
                buyPrice,
                MSRP
            FROM products
            WHERE productCode=?');
        $stmt->execute(array($this->code));
        $row = $stmt->fetch();
        
        $this->name = $row['productName'];
        $this->line = $row['productLine'];
        $this->scale = $row['productScale'];
        $this->vendor = $row['productVendor'];
        $this->description = $row['productDescription'];
        $this->quantityInStock = $row['quantityInStock'];
        $this->buyPrice = $row['buyPrice'];
        $this->MSRP = $row['MSRP'];
    }

}

?>