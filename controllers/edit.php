<?php ob_start();  
require_once("../functions/functions.php");
include_once('../db/dbconnect.php');

$title = $body = '';

if(isset($_POST['update-submit']))
{
  $id = e($_POST['id']);
  $title = e($_POST['title']);
  
  $body = $_POST['body'];
  /* $body = sanitizeHtml($_POST['body'], $safeHtmlTags); */

  if(empty($title) || empty($body))
  {
      header("Location: editpost?id=$id&error=emptyfields");
      exit();
  }
  else
  {
    $sql = "UPDATE notes SET title=:title, body=:body WHERE id=:id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ":id" => $id,
      ":title" => $title,
      ":body" => $body
    ));
  
  $pdo = null;

    if($stmt){
    header('Location: /');
    }
  }
} 

include_once('../views/partials/edit-form.php');
