<?php require_once('includes/header.php'); ?>
<?php require_once('src/products.inc.php'); ?>
<?php 
$product = new Product();
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $product->delete($id);
}
?>
<div class="dashboard">
    <?php include_once('add_product.php'); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $rows = $product->getProducts();
            $i = 1;
            foreach ($rows as $row) { ?>
            <tr>
                <th scope="row"><?php echo ($i) ?></th>
                <td><?php echo ($row['productCode']); ?></td>
                <td><?php echo ($row['productName']); ?></td>
                <td><?php echo ($row['productDescription']); ?></td>
                <td><?php echo ($row['buyPrice']); ?></td>
                <td><?php echo ($row['img']); ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="edit_product.php?id=<?php echo ($row['productCode']); ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="products.php?del=<?php echo ($row['productCode']); ?>">Delete</a>
                </td>
            </tr>
            <?php 
            $i++;
        }
        ?>
        </tbody>

    </table>
</div>

<?php include_once('includes/footer.php'); ?> 