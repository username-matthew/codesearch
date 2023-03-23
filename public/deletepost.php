<?php 
require_once("../functions/functions.php");  

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
}
include_once('../controllers/delete_data.php');