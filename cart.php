<?php 
require_once("../classes/models/Product.php");
require_once("../classes/models/Order.php");
require_once("../classes/models/OrderDetails.php");

?>

<?php
include('../includes/header.php');

$order = new Order("10101");
$orderDetails = $order->get_order_details();

?>

<div>
    <ul>
<?php
foreach($orderDetails as $orderDetail) {
    $product = new Product($orderDetail->productCode);
    echo("<li>$product->name, $orderDetail->quantity</li>");
}
?>
    </ul>
</div>

<?php
include('../includes/footer.php');
?> 