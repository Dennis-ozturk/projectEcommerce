<?php include('../db/config.php'); ?>
<?php session_start(); ?>
<?php include('../includes/header.php'); ?>
<?php include("../src/customer/login_function.php") ?>
<?php include("../src/customer/logout_function.php") ?>

<form action="" method="POST">
    username:<br>
    <input type="text" name="user">
    <br>
    password:<br>
    <input type="password" name="password">
    <br>
    <input type="submit" name="action">
</form>

<?php if($userLoggedIn): ?>
    <div>
        <br>
        <span>Dina erbjudanden </span>
        <?php echo $_SESSION['user']; ?>
    </div>
<?php endif; ?>

<a href="?logout=true">Logga ut</a>


<?php include('../includes/footer.php'); ?>
