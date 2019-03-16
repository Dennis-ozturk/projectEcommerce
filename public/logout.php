<?php 
session_start();
require_once('../includes/header.php');
include_once("/src/login.inc.php");
$logout = new User();
echo "<script type='text/javascript'>alert('Logging in!');</script>";
$logout->logOut();