<?php ob_start();  
require_once("../functions/functions.php");  
session_start();

$msg = $title = $body = '';

if(isset($_POST['submit']))
{
  $title = e($_POST['title']);
  
  $body = $_POST['body'];
  /* $body = sanitizeHtml($_POST['body'], $safeHtmlTags); */

  if(empty($title) || empty($body))
  {
      header("Location: createpost?error=emptyfields&title=$title&body=$body");
      exit();
  } 
  include_once('../db/dbconnect.php');
  $query = $pdo->prepare('SELECT title FROM notes WHERE title=:title');
    $query->execute(array(
        "title" => $title
      )); 
    if($query->rowCount() > 0)
    {
      header("Location: createpost?error=duplicatetitle");
      exit();
    }
  if($_FILES['image']['size'] > 2000000)
  {  
    header("Location: createpost?error=wrongfilesize");
    exit();
  }
  if($_FILES['image']['name'])
  {
    $temp = explode(".", $_FILES["image"]["name"]);
    $newFileName = round(microtime(true)) . '.' . end($temp);
    $target = e("images/".basename($newFileName)); 

    $file_type = $_FILES['image']['type'];
    $allowed = array("image/jpeg", "image/jpg", "image/png", "image/gif");
  }else
  {
    $file_type = $_FILES['image']['type'];
    $allowed = array(null);
  }
  if(!in_array($file_type, $allowed))
  {  
    header("Location: createpost?error=wrongfileformat");
    exit();
  }
  else
  {
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
    {
      $msg = "Image uploaded successfully";
    } else
    {
      echo $msg = "There was a problem uploading the image";
    }
  }

  if($sql = null)
  {
    echo "error";
  }
  
  else
  {
    $sql = "INSERT INTO notes(title, body, image) VALUES (:title, :body, :image)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      "title" => $title,
      "body" => $body,
      "image" => $target
    ));

    $pdo = null;

    if($stmt){
      header('Location: /');
    }
  }
}

include_once('../views/partials/create-form.php');
