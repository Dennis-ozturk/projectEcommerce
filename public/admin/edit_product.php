<?php 
require_once('includes/header.php');
require_once('src/products.inc.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $item = new Product();
    $result = $item->selectOneProduct($id);
}
?>
<h4>Edit product</h4>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo ($result['productCode']); ?>">
    <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" name="productName" aria-describedby="emailHelp" placeholder="Name" value="<?php echo ($result['productName']); ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" cols="100" rows="5" name="productDescription"><?php echo ($result['productDescription']); ?></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="buyPrice" placeholder="Price" value="<?php echo ($result['buyPrice']); ?>">
    </div>
    <div class="form-group">
        <label for="product_img">Image</label>
        <input type="file" class="form-control" name="product_img" value="<?php echo ($result['img']); ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="submit">
</form>

<?php 

if (isset($_POST['submit'])) {
    $fields = [
        ':productName' => filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING),
        ':productDescription' => filter_input(INPUT_POST, 'productDescription', FILTER_SANITIZE_STRING),
        ':buyPrice' => filter_input(INPUT_POST, 'buyPrice', FILTER_SANITIZE_NUMBER_INT),
        ':product_img' => filter_input(INPUT_POST, 'product_img', FILTER_SANITIZE_STRING),
    ];
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); 

    echo $id;

    $editProduct = new Product();
    $editProduct->edit($fields, $id);
}

?> 