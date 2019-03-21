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

    function __construct($code, $readFromDb = true) {
        $this->code = $code;
        if ($readFromDb) {
            $this->read_from_db();
        }
    }

    static function get_from_data($dbData) {
        $product = new Product($dbData['productCode'], false);
        $product->name = $dbData['productName'];
        $product->line = $dbData['productLine'];
        $product->scale = $dbData['productScale'];
        $product->vendor = $dbData['productVendor'];
        $product->description = $dbData['productDescription'];
        $product->quantityInStock = $dbData['quantityInStock'];
        $product->buyPrice = $dbData['buyPrice'];
        $product->MSRP = $dbData['MSRP'];

        return $product;
    }

    static function get_most_popular() {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('
            SELECT
                products.productCode AS productCode,
                products.productName AS productName,
                products.productLine AS productLine,
                products.productScale AS productScale,
                products.productVendor AS productVendor,
                products.productDescription AS productDescription,
                products.quantityInStock AS quantityInStock,
                products.buyPrice AS buyPrice,
                products.MSRP AS MSRP,
                SUM(orderdetails.quantityOrdered) as orderCount FROM products
            LEFT JOIN orderdetails ON products.productCode = orderdetails.productCode
            GROUP BY products.productCode
            ORDER BY orderCount DESC LIMIT 5;
        ');

        $products = array();
        $stmt->execute(array());
        while($row = $stmt->fetch()) {
            $products[] = Product::get_from_data($row);
        }
        return $products;

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