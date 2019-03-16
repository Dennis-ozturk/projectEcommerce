<?php include('../includes/header.php'); ?>

<h1>Index file test</h1>
    <?php
    if($_SESSION['user']){
        echo "<h5>Välkommen ".$_SESSION['user']."</h5>";
    }else{
        echo "<h5>Inte inloggad</h5>";
    }


?>
<?php include('../includes/footer.php'); ?> 