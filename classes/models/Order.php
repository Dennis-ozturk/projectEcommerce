<?php
require_once("../db/Database.php");
require_once("OrderDetails.php");

class Order {
    public $number = false;
    public $date;
    public $requiredDate;
    public $shippedDate;
    public $status;
    public $comments;
    public $customerNumber;

    function __construct($number) {
        $this->number = $number;
        $this->read_from_db();
    }

    private function read_from_db() {
        $pdo = Database::pdo();
        $stmt = $pdo->prepare('
            SELECT
                orderDate,
                requiredDate,
                shippedDate,
                status,
                comments,
                customerNumber
            FROM orders
            WHERE orderNumber=?');
        $stmt->execute(array($this->number));
        $row = $stmt->fetch();
        
        $this->date = $row['orderDate'];
        $this->requiredDate = $row['requiredDate'];
        $this->shippedDate = $row['shippedDate'];
        $this->status = $row['status'];
        $this->comments = $row['comments'];
        $this->customerNumber = $row['customerNumber'];
    }

    public function get_order_details() {
        return OrderDetails::get_from_order($this->number);
    }
}

?>