<?php 
  session_start();
  require_once("../functions/functions.php");  
  $title = $_GET['title'];
  $body = $_GET['body'];
  $image = $_FILES['image'];
?>

<div class="post-form signing-form">

<a rel="nofollow" style="margin-bottom:20px;" class="button back-btn mt10 mb10" href="/">Back</a>

<?php require_once('syntax-helper.php') ?>

<div class="render-errors">
<?php 
    
    if(isset($_GET['error']))
    {
      if($_GET['error'] == "emptyfields")
      {
        echo "<div>Please fill in all fields</div>";
      }
      else if($_GET['error'] == "duplicatetitle")
      {
        echo "<div>That title has already been used</div>";
      }
      else if($_GET['error'] == "wrongfileformat")
      { 
        echo "<div>File format not allowed</div>";
      }
      else if($_GET['error'] == "wrongfilesize")
      { 
        echo "<div>File too large</div>";
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

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

  <input name="csrf" type="hidden" value="<?php echo e($_SESSION['csrf']); ?>">

  <?php 

    if(isset($_GET['title']))
    {
      echo '<label style="padding-top:20px;">Title</label><br><input value="' . e($title) . '" type="text" name="title" placeholder="Title" style="height:40px;">';
    } 
    else
    {
      echo '<label style="padding-top:20px;">Title</label><br><input class="mb10 mt10" value="' . e($title) . '" type="text" name="title" placeholder="Title" style="height:40px;">';
    }

    if(isset($_GET['body']))
    {
      echo '<label>Body</label><br><textarea type="text" name="body" placeholder="Body">' . sanitizeHtml($body, $safeHtmlTags) . '</textarea>';
    } 
    else
    {
      echo '<label>Body</label><br><textarea type="text" name="body" placeholder="Body">' . sanitizeHtml($body, $safeHtmlTags) . '</textarea>';
    }
?>
<div>

  <input style="padding-bottom: 30px;" type="file" name="image" value="<?php e($image) ?>">

  <input class="mt10 button" type="submit" name="submit" value="submit">

</form>
</div>
</div>
