<?php 
  session_start();
  require_once("../functions/functions.php");  

  require '../views/partials/nav.php';
?>
<div class="grid">

  <?php if(!isset($_SESSION["username"])) { ?>
      <input name="csrf" type="hidden" value="<?php echo e($_SESSION['csrf']); ?>">
  <?php } ?>

<!-- Single page pre pagination JS search (public/js/search.js)-->
<!-- <input type="text" id="search" onkeyup="doSearch()" placeholder="Case senstive search (use capitals wisely)"> -->

<!-- Search box and render results -->
<!-- Display search box -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
  <input name="csrf" type="hidden" value="<?php echo e($_SESSION['csrf']); ?>">
  <div class="search-container">
    <input type="search" class="search-box" type="text" name="search" placeholder=" Search" required autofocus />
    <input class="search-btn" type="submit" value="SEARCH" />
  </div>
</form>

<!-- Search query -->
<?php 
    if (isset($_POST["search"])){
      if(count($results) > 0){
        foreach($results as $r){
?>
    <div class="card">
    <label><?php echo e($r->title); ?></label>

    <p class="post-content"><?php echo sanitizeHtml($r->body, $safeHtmlTags); ?></p>
    <?php 
      if($r->image) { ?>
        <img src="<?php echo e($r->image); ?>" alt="IMAGE">
    <?php } ?>

    </div><!-- \card -->

    <!-- If logged in, render edit/delete buttons with SEARCH RESULTS -->
<?php if(isset($_SESSION["username"])) { ?>
    
  <div class="modify-buttons">
    
    <a rel="nofollow" href="editpost?id=<?php echo e($r->id); ?>" class="edit">EDT</a>

    <a rel="nofollow" href="deletepost?id=<?php echo e($r->id); ?>" onclick="return confirm('Are you sure?')" class="delete">DEL</a>
    
  </div>

<?php  }?>
<?php } ?>





<!--  -->
      <div style="margin-top:50px; text-align:center;">
        <p class="mt100">
          <?php 
            echo "//////////////////////////////////////////////";
          ?>
        </p>
        <p>
          <?php 
            echo "SEARCH RESULTS END";
          ?>
        </p>
        <p>
          <?php 
            echo "//////////////////////////////////////////////";
          ?>
        </p>
        <p class="search-home-link"><a href="/">Home</a></p>
      </div>

<?php } else { ?> <p style="margin-top: 50px; text-align:center;"> <? echo "No results. Try alternative wording."; } ?> </p>
<? } ?>

<!-- \Search box and render results -->


<!-- Display posts on page -->
  <?php 
      if(!empty($notes)){
      foreach($notes as $note){
  ?>
<div class="card">
<label><?php echo e($note->title); ?></label>

<p class="post-content"><?php echo sanitizeHtml($note->body, $safeHtmlTags); ?></p>
<?php 
  if($note->image) { ?>
    <img src="<?php echo e($note->image); ?>" alt="IMAGE">
<?php } ?>

</div><!-- \card -->

<!-- If logged in, render edit/delete buttons -->
<?php if(isset($_SESSION["username"])) { ?>
    
  <div class="modify-buttons">
    
    <a rel="nofollow" href="editpost?id=<?php echo e($note->id); ?>" class="edit">EDT</a>

    <a rel="nofollow" href="deletepost?id=<?php echo e($note->id); ?>" onclick="return confirm('Are you sure?')" class="delete">DEL</a>
    
  </div>

<?php  }}?>


  <?php } else { echo '<p class="center">Database is empty</p>';} ?>



<!-- Pagination links -->

<div style="margin: 50px 0px; text-align:center;" class="pagination">

<?php
if($page>1){
  echo '<a href="index.php?page='.($page-1).'">Prev &larr;</a>';
}

// Display page numbers on front end.
// for($i=1; $i<=$number_of_pages; $i++)
// {
//     echo '<a href="index.php?page='.$i.'">'.$i.'</a>';
// }

// display page n of total pages
echo " ({$page} of {$number_of_pages}) ";


if($number_of_pages>$page){
  echo '<a href="index.php?page='.($page+1).'"> Next &rarr;</a>';
}

?> 
</div>
<!-- \Pagination links -->

</div><!-- \grid -->