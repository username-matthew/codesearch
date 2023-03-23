<?php
  session_start();
  require_once("../functions/functions.php");  
  $username = $email = $password = $passwordRepeat = '';
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
  <a rel="nofollow" class="button login-btn nav-btn" href="/login">Login</a>
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
      else if($_GET['error'] == "invalidemailandusername")
      {
        echo "<div>Username and Email must be valid</div>";
      }
      else if($_GET['error'] == "invalidemail")
      {
        echo "<div>Email must be valid</div>";
      }
      else if($_GET['error'] == "invalidusername")
      {
        echo "<div>Username must be valid</div>";
      }
      else if($_GET['error'] == "passwordcheck")
      {
        echo "<div>Passwords must match</div>";
      }
      else if($_GET['error'] == "usertaken")
      {
        echo "<div>Username already taken</div>";
      }
      else if($_GET['error'] == "emailtaken")
      {
        echo "<div>Email address has already been used</div>";
      }
    }
  ?>
</div>

<div class="form-title mb10">
  Register
</div>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="new-password">
  
  <input name="csrf" type="hidden" value="<?php echo e($_SESSION['csrf']); ?>">
  
  <input value="<?php echo e($username); ?>" type="text" name="username" placeholder="Username"  autocomplete="new-password">
  <input value="<?php echo e($email); ?>" type="text" name="email" placeholder="Email"  autocomplete="new-password">
  <input value="<?php echo e($password); ?>" type="password" name="password" placeholder="Password"  autocomplete="new-password">
  <input value="<?php echo e($passwordRepeat); ?>" type="password" name="password-repeat" placeholder="Confirm Password"  autocomplete="new-password">

  <button class="mt10" type="submit" name="register-submit">Register</button>

</form>

</div>
</div>