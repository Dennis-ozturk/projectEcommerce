<?php require_once('includes/header.php'); ?>
<?php require_once('src/orders.inc.php'); ?>
<?php 
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $orderDel = new Order();
        $orderDel->delete($id);
    }
?>
<div class="dashboard">
    <?php include_once('add_order.php'); ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order Number</th>
                <th scope="col">Order Date</th>
                <th scope="col">Comment</th>
                <th scope="col">Customer Number</th>
                <th scope="col">Action</th>
            </tr>
        </thead>    

        <tbody>
            <?php 
                $order = new Order();
                $rows = $order->getOrders();
                $i = 1;
                foreach($rows as $row){?>
                <tr>
                    <th scope="row"><?php echo($i) ?></th>
                    <td><?php echo($row['orderNumber']); ?></td>
                    <td><?php echo($row['orderDate']); ?></td>
                    <td><?php echo($row['comments']); ?></td>
                    <td><?php echo($row['customerNumber']); ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="edit_order.php?id=<?php echo($row['orderNumber']); ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="orders.php?del=<?php echo($row['orderNumber']); ?>">Delete</a>
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


