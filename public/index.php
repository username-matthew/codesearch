<?php

session_start();

//   if(isset($_SESSION["username"]))
// {
//   require '../views/partials/nav.php';
// } else { }


// 
// 
// 
// require '../views/partials/nav.php';
// ^^^^^^^^^^^ moved to index-screen.php
?>

<?php 
include_once('../db/dbconnect.php'); 

require '../controllers/fetchall.php';

ob_start();

require '../functions/functions.php';

?>

<?php include_once('../views/partials/index-screen.php'); ?>

<?php $content = ob_get_clean(); include_once("../views/master-view.php"); ?>