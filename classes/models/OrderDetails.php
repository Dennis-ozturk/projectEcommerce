<?php
require_once("../db/Database.php");
require_once("Product.php");

class OrderDetails {
    public $orderNumber = false;
    public $productCode;
    public $quantity;
    public $priceEach;
    public $orderLineNumber;

    function __construct($orderNumber, $productCode, $readFromDb = true) {
        $this->orderNumber = $orderNumber;
        $this->productCode = $productCode;
        if($readFromDb) {
            $this->read_from_db();
        }
    }

    static function get_from_data($dbData) {
        $orderDetails = new OrderDetails($dbData['orderNumber'], $dbData['productCode'], false);
        $orderDetails->quantity = intval($dbData['quantityOrdered']);
        $orderDetails->priceEach =(float) $dbData['priceEach'];
        $orderDetails->orderLineNumber = $dbData['orderLineNumber'];
        return $orderDetails;
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
            $orderDetails[] = OrderDetails::get_from_data($row);
        }
        return $orderDetails;
    }

    private function read_from_db() {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('
            SELECT
                quantityOrdered,
                priceEach,
                orderLineNumber
            FROM orderdetails
            WHERE orderNumber=? AND productCode = ?');

        $stmt->execute(array($this->orderNumber, $this->productCode));
        $row = $stmt->fetch();
        
        $this->quantity = intval($row['quantityOrdered']);
        $this->priceEach = (float) $row['priceEach'];
        $this->orderLineNumber = $row['orderLineNumber'];
    }

    function change_quantity($changeBy) {
        $this->quantity += $changeBy;
        if ($this->quantity < 1) {
            $this->quantity = 1;
        }
    }

    function save_to_db() {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('
        UPDATE orderdetails
        SET
            quantityOrdered = ?,
            priceEach = ?,
            orderLineNumber = ?
        WHERE orderNumber = ? AND productCode = ?;
        ');

        $stmt->execute(array(
            $this->quantity,
            $this->priceEach,
            $this->orderLineNumber,
            $this->orderNumber,
            $this->productCode
        ));
    }

    function delete_from_db() {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('
        DELETE FROM orderdetails
        WHERE orderNumber = ? AND productCode = ?;
        ');

        $stmt->execute(array(
            $this->orderNumber,
            $this->productCode
        ));
    }
}

?>