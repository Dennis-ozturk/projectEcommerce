<?php require_once('../classes/models/Product.php'); ?>

<?php include('../includes/header.php'); ?>

<h1>Index file test</h1>
<?php
if(isset($_SESSION['user'])){
    echo "<h5>Välkommen ".$_SESSION['user']."</h5>";
}else{
    echo "<h5>Inte inloggad</h5>";
}

$popularProducts = Product::get_most_popular();
echo("<h5>Mest populära produkterna just nu!</h5>");
echo("<ul>");
foreach($popularProducts as $product) {
    echo("<li>");
    echo($product->name);
    echo("</li>");
}
echo("</ul>");

?>
<?php include('../includes/footer.php'); ?> 