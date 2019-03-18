<?php
require_once('../db/config.php');
include_once('../public/src/login.inc.php');
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css">
    <script src="assets/functions/jquery.slim.min.js"></script>
    <script src="../public/assets/functions/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
   <!-- HEADER -->
   <header>
        <nav>
            <!-- MOBILE BTN:DROPDOWN -->
            <label for="toggle"><i class="fas fa-align-justify"></i></label>
            <input type="checkbox" id="toggle">
            <!-- MOBILE/WEB NAVIGATION -->
            <ul class="menu">  
                <li><a href="product-category-page">Vehicles</a></li>
                <li><a href="category">About us</a></li>
                <li><a href="#">Contact us</a></li>
                <?php
                    if($_SESSION['user']){
                ?>
                    <li><a href="#">My profile</a></li>
                <?php 
                }else{ ?>
                    <li><?php include_once('userLogin.php'); ?></li>
                <?php }?>
                    <li><a href="#">Cart</a></li>
                <?php
                if($_SESSION['user']){
                ?>
                    <li><a href="logout.php">Log out</a></li>
                <?php }else{?>
                <li><a href="createAccount.php">Not registerd yet?<br> Register now!</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>