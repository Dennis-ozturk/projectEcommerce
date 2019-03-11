<?php
require_once('../db/config.php');
session_start();
require_once('../includes/header.php');

$productName = $_GET["product"];
$stmt = $conn->query("SELECT * FROM products WHERE productName LIKE '$productName'");
$row = $stmt->fetch();
?>
<Main class="product-container">
    <a class="back-page" href="javascript:history.go(-1)">Previous page</a>
    <section class="product">
        <img src="<?php ?>https://picsum.photos/600/500" alt="product-<?php echo $row['productName'];?>">
        <div class="vertical-hr"></div>
        <section>
            <section>
                <h1><?php echo $row['productName'];?></h1>
                <h3>Description:</h3>
                <p><?php echo $row['productDescription'];?></p>
            </section>
            <p>Article Number: <?php echo $row['productCode'];?></p>
            <section>
            <p>Price: $<?php echo $row['buyPrice'];?></p>
            <button>Add to cart</button>
            </section>
        </section>
    </section>
</Main>


<?php
require_once('../includes/footer.php');
?>