<?php 
  session_start();
  require_once("../functions/functions.php");  
  $username = $_GET['username'];
  $password = $_GET['password'];
?>
<div class="grid signing-form">

<?php
  if(isset($_SESSION["username"]))
{
    header("Location: /");
    exit();
} 
else { ?>

<div class="register mt10 mb10">
  <a rel="nofollow" class="button home-btn nav-btn" href="/">Home</a>
  <a href="/"><img class="home-icon" src="icons/home-icon.svg" alt="HOME"/></a>
  <a rel="nofollow" class="button register-btn nav-btn" href="/register">Register</a>
</div>

<?php } ?>

<div class="post-form">
<div class="render-errors">
<?php 
    
    if(isset($_GET['error']))
    {
      if($_GET['error'] == "emptyfields")
      {
        echo "<div>Please fill in all fields</div>";
      }
      else if($_GET['error'] == "wrongpassword")
      {
        echo "<div>Password check failed!</div>";
      }
      else if($_GET['error'] == "nouserfound")
      {
        echo "<div>No user found</div>";
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

<div class="form-title mb10">
  Login
</div>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<input name="csrf" type="hidden" value="<?php echo e($_SESSION['csrf']); ?>">

  <?php 
    if(isset($_GET['username']))
    {
      echo '<input value="' . e($username) . '" type="text" name="username" placeholder="Username">';
    } 
    else
    {
      echo '<input value="' . e($username) . '" type="text" name="username" placeholder="Username">';
    }
  ?>
  <input value="<?php echo e($password); ?>" type="password" name="password" placeholder="Password"> 
  
  <button class="mt10" type="submit" name="login-submit">Login</button>

</form>
</div>
</div>