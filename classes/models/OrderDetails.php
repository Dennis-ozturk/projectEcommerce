<?php
require_once("../db/Database.php");
require_once("Product.php");

class OrderDetails {
    public $orderNumber = false;
    public $productCode;
    public $quantity;
    public $priceEach;
    public $orderLineNumber;

    function __construct($dbData) {
        $this->productCode = $dbData['productCode'];
        $this->quantity = $dbData['quantityOrdered'];
        $this->priceEach = $dbData['priceEach'];
        $this->orderLineNumber = $dbData['orderLineNumber'];
    }

    static function get_from_order($orderNumber) {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('
            SELECT
                orderNumber,
                productCode,
                quantityOrdered,
                priceEach,
                orderLineNumber
            FROM orderdetails
            WHERE orderNumber=?');
        $stmt->execute(array($orderNumber));

        $orderDetails = array();
        while( $row = $stmt->fetch() ) {
            $orderDetails[] = new OrderDetails($row);
        }
        return $orderDetails;
    }
}

?>