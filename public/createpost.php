<?php

require_once("../functions/functions.php");  

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
}

  session_start();
  if(isset($_SESSION["username"]))
{
  
  ob_start(); 

  include_once('../controllers/create.php');
  
?>

<?php $content = ob_get_clean(); include_once("../views/master-view.php");

}
else{
  header("Location: ../?redirect=login");
  exit();
}
?>