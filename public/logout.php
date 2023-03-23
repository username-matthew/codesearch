<?php
require_once("../functions/functions.php");  

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
}
session_start();
session_unset();
session_destroy();
header("Location: /");
header_remove("x_powered-by");