<?php
ob_start();
include_once("../views/partials/header.php"); 

?>

<?php echo $content; ?>

<?php fileIfPartial("../views/partials/footer.php"); ?>

