<?php 
require_once('includes/header.php');
require_once('src/orders.inc.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $item = new Order();
    $result = $item->selectOneOrder($id);
}
?>
<h4>Edit product</h4>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo($result['orderNumber']); ?>">
    <div class="form-group">
        <label for="name">Order Date</label>
        <input type="text" class="form-control" name="orderDate" aria-describedby="emailHelp" placeholder="Order Date (YYYY-MM-DD)" value="<?php echo($result['orderDate']); ?>">
    </div>
    <div class="form-group">
        <label for="description">Comment</label>
        <textarea class="form-control" cols="100" rows="5" name="comments"><?php echo($result['comments']); ?></textarea>
    </div>
    <div class="form-group">
        <label for="price">Customer Number</label>
        <input type="text" class="form-control" name="customerNumber" placeholder="Customer Number" value="<?php echo($result['customerNumber']); ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="submit">
</form>

<?php 

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $orderDate = $_POST['orderDate'];
    $comments = $_POST['comments'];
    $customerNumber = $_POST['customerNumber'];

    $fields = [$orderDate, $comments, $customerNumber];

    $editProduct = new Order();
    $editProduct->edit($fields, $id);
}

?>