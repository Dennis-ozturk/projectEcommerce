<?php 
require_once('../includes/header.php');
include_once("/src/login.inc.php");
$logout = new User();
$logout->logOut();

