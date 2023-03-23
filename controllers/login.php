<?php ob_start();
require_once("../functions/functions.php");  
session_start();

$username = $password = '';

if(isset($_POST["login-submit"]))
{  
  $username = e($_POST["username"]);
  $password = e($_POST["password"]);

  if(empty($username) && empty($password))
  {
    header("Location: login?error=emptyfields");
    exit();
  }
  else
  {
    $sql = 'SELECT * FROM users WHERE username = :username';
    require("../db/dbconnect.php");
    $stmt = $pdo->prepare($sql);
    if(!$stmt)
    {
      header("Location: login?error=sqlerror");
      exit();
    }
    else
    {
      $stmt->execute(array(
        'username' => $_POST["username"]
      ));
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() > 0)
      {
        $password_check = password_verify($password, $row['password']);
        if($password_check == false)
        {
          header("Location: login.php?error=wrongpassword");
          exit();
        }
        else
        {
          session_regenerate_id();
          $_SESSION["authorized"] = true;
          $_SESSION["username"] = $_POST["username"];
          session_write_close();
          header("Location: /");
          exit();
        }
      }
      else 
      { 
        header("Location: login?error=nouserfound&username=$username");
        exit();
      }
    }
  }
  $pdo = null;  
}
else 
{
  echo null;
}
include_once('../views/partials/login-form.php');