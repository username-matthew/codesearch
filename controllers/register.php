<?php ob_start();
require_once("../functions/functions.php");  
session_start();

$username = $email = $password = $passwordRepeat = '';

if(isset($_POST['register-submit']))
{
  $username = e($_POST["username"]);
  $email = e($_POST["email"]);
  $password = e($_POST["password"]);
  $passwordRepeat = e($_POST["password-repeat"]);

  if(
    empty($username) || 
    empty($email) || 
    empty($password)  || 
    empty($passwordRepeat))
    {
      header("Location: register?error=emptyfields");
      exit();
    }
  
  else 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
  {
    header("Location: register?error=invalidemailandusername");
    exit();
  }
  else 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    header("Location: register?error=invalidemail");
    exit();
  }
  else 
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
  {
    header("Location: register?error=invalidusername");
    exit();
  }
  else 
    if($password !== $passwordRepeat)
  {
    header("Location: register?error=passwordcheck");
    exit();
  }
  else
  {
    require("../db/dbconnect.php");
    $query = $pdo->prepare('SELECT username FROM users WHERE username=:username');
    $query->execute(array(
        "username" => $username
      )); 
    if($query->rowCount() > 0)
    {
      header("Location: register?error=usertaken");
      exit();
    }
    $query2 = $pdo->prepare('SELECT email FROM users WHERE email=:email');
    $query2->execute(array(
        "email" => $email
      )); 
    if($query2->rowCount() > 0)
    {
      header("Location: register?error=emailtaken");
      exit();
    }
    else 
    {
      $sql = "INSERT INTO users(username, email, password) SELECT :username, :email, :password FROM DUAL WHERE NOT EXISTS(SELECT username FROM users WHERE username=:username AND email=:email)";

      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        "username" => $username,
        "email" => $email,
        "password" => $hashedPwd
      ));
        session_regenerate_id();
        $_SESSION["authorized"] = true;
        $_SESSION["username"] = $_POST['username'];
        session_write_close();
        header("Location: /");
        exit();
    }
  }
  $pdo = null;
} 
else 
{
  echo null;
}
include_once("../views/partials/register-form.php");