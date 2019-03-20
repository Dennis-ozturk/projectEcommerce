<?php 
require_once("../classes/models/Product.php");
require_once("../classes/models/Order.php");
require_once("../classes/models/OrderDetails.php");

if ($_POST) { //om formulär skickats för ändring i kundkorgen, hantera formuläret

    if (
        isset($_POST["action"]) && 
        isset($_POST["order"]) &&
        isset($_POST["product"])
    ) {
        $orderDetails = new OrderDetails($_POST["order"], $_POST["product"]);
        // kolla så att ändringar bara sker ifall kundkorgen tillhör inloggad person

        if($_POST["action"] == "removeOne") {
            $orderDetails->change_quantity(-1);
            $orderDetails->save_to_db();

        } elseif($_POST["action"] == "addOne") {
            $orderDetails->change_quantity(+1);
            $orderDetails->save_to_db();

        } elseif($_POST["action"] == "remove") {
            $orderDetails->delete_from_db();
        }
    }

    echo("<meta http-equiv='refresh' content='0'>");

} else { // om inte formulär skickats visa kundkorgen
    include('../includes/header.php');
    
    
    $order = new Order("10103");    // <-- ska hämtas från inloggad användare. Just nu så kan jag ta fram samtliga varukorgar från databasen genom ett orderNumber. 
                                        // När man klickar på add to cart så bör det finnas en funktion där som lägger in OrderNumber och CustomerNumber i databasen.
    $orderDetails = $order->get_order_details();
    
    ?>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>antal</th>
                <th>pris</th>
                <th>totalt</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php
    $totalPrice = 0;
    foreach($orderDetails as $orderDetail) {
        $product = new Product($orderDetail->productCode);
        $orderDetailPrice = $orderDetail->priceEach * $orderDetail->quantity;
        $totalPrice += $orderDetailPrice;
        ?>
            <tr>
                <td>
                    <?php echo($product->name);?>
                </td>
                <td>
                    <?php echo($orderDetail->quantity); ?>
                </td>
                <td>
                    <?php echo(number_format($orderDetail->priceEach, 2)); ?>
                </td>
                <td>
                    <?php
                    echo(number_format($orderDetailPrice, 2));
                    ?>
                </td>
                <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input style="display:none" type="text" name="order" value="<?php echo($order->number); ?>">
                        <input style="display:none" type="text" name="product" value="<?php echo($product->code); ?>">
                        <button type="submit" name="action" value="removeOne">-1</button>
                        <button type="submit" name="action" value="addOne">+1</button>
                        <button type="submit" name="action" value="remove">Ta bort</button>
                    </form>
                </td>
            </tr>
        <?php
    }
    ?>
        <tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <?php echo(number_format($totalPrice, 2)); ?>
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <?php
    include('../includes/footer.php');
}
?> 