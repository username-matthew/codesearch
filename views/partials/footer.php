<!-- <script defer src='/js/syntax.js'></script> -->

<script defer src='/js/gradient.js'></script>

<script defer src='/js/search.js'></script>


<?php 
$ignorepage="login.php";
$ignorepage2="register.php";
$place="/login";

$currentpage = basename($_SERVER['SCRIPT_FILENAME']);
?>

  <?php if(!isset($_SESSION["username"])) { ?>
  
  <?php if($currentpage==$ignorepage || $currentpage==$ignorepage2) { 
    echo null;
  ?>  
  <?php } else { ?>
    <div style="text-align:center;">
      <a style="color: rgb(14,18,24);" onclick="return false" ondblclick="location=this.href" href="<?php echo $place; ?>">&#8508;</a>
    </div>
  <?php } ?>
  
  <?php } ?>


</body>
</html>
