<?php require_once('includes/header.php'); ?>
<?php require_once('src/customers.inc.php') ?>
<?php 
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $productDel = new Customer();
    $productDel->delete($id);
}
?>


<div class="dashboard">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Username</th>
                <th scope="col">date joined</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            $url = filter_var('http://schoolproject/admin/customers', FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
            $product = new Customer();

            $rows = $product->getAllCustomers();
            foreach ($rows as $row) { ?>
            <tr>
                <th scope="row"><?php echo ($row['id']); ?></th>
                <td><?php echo ($row['username']); ?></td>
                <td><?php echo ($row['date_added']); ?></td>
                <td>
                    <a class="btn btn-sm btn-danger" href="<?php echo($url . '?del=' . $row['id']); ?>">Delete</a>
                </td>
            </tr>
            <?php 
        }
        ?>
        </tbody>

    </table>
</div>


<?php include_once('includes/footer.php'); ?>