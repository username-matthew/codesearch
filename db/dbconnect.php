<?php 
include_once('dbconfig.php');

$dsn = "mysql:host=$DBHOST;dbname=$DBNAME;charset=utf8";

try {
  $pdo = new PDO($dsn, $DBUSER, $DBPASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>