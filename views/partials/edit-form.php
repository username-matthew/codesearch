<?php ob_start();  
  session_start();
  require_once("../functions/functions.php");  

  $id = $_GET["id"];

  $sql = "SELECT * FROM notes WHERE id=:id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(":id" => $id));

  while($note = $stmt->fetch(PDO::FETCH_ASSOC)){
    $title = $note["title"];
    $body = $note["body"];
}
?>

<div class="post-form signing-form">

<a rel="nofollow" style="margin-bottom:20px;" class="button edit-back-btn mt10 mb10" href="/">Back</a>

<?php require_once('syntax-helper.php') ?>

<div class="render-errors">
<?php 

    if(isset($_GET['error']))
    {
      if($_GET['error'] == "emptyfields")
      {
        echo "<div>Please fill in all fields</div>";
      }
      else
      {
        echo null;
      }
    } 
    else
    {
      null;
    }
  ?>
</div>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

<input name="csrf" type="hidden" value="<?php echo e($_SESSION['csrf']); ?>">

<div>
    <label style="padding-top:20px;">Title</label><br>
    <input class="mt10 mb10" type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
    
    <label>Body</label><br>
    
    <textarea type="text" name="body"><?php echo sanitizeHtml($body, $safeHtmlTags); ?></textarea>

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input class="button" type="submit" name="update-submit" value="update">

</div>
</form>    
</div>
