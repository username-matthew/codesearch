<?php
require_once("../functions/functions.php");  

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
}

ob_start(); 
include_once('../controllers/login.php');
  
$content = ob_get_clean(); include_once("../views/master-view.php");