<?php require_once('../../db/config.php'); ?>
<?php require_once('src/user.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css">
</head>
<body class="admin_page">
    <h1>Admin panel</h1>
    <form action="" method="POST" class="form">

        <span>Username</span> 
        <br>
        <input type="text" name="username" placeholder="Username">
        <br>
        <br>
        <span>Password</span>
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <br>
        <input type="submit" name="sub" value="Submit">
    </form>
    <?php 
        if(isset($_POST['sub'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $object = new User;
            $object->getAllUsers($_POST['username'], $_POST['password']);
        }
    ?>
</body>
</html>


