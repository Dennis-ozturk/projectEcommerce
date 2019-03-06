<?php
require_once('../db/config.php');
require_once('src/CategoryProductObjects.php');
require_once('../includes/header.php');
$_SESSION['page'] = $_SERVER["REQUEST_URI"];
$prodQuery = new CategoryProducts();
session_start();
?>


<Main>
    <section class="category-container">
    <?php
    $nrRows = $prodQuery->printProducts();
    ?>
    </section>
    <a href="?products=<?php echo $nrRows;?>" name="next50" class="prod-load">load more</a>
</Main>

<?php
require_once('../includes/footer.php');
?>