<div class="grid">
<nav>
 <ul>

<?php 
session_start();

if(isset($_SESSION["username"])) { ?>
  
  <li>
    <a rel="nofollow" class="button" href="createpost">Create</a>
  </li>

<?php } ?>


  <li><a href="/"><img class="home-icon" src="icons/home-icon.svg" alt="HOME"/></a></li>


<?php 
session_start();

  if(isset($_SESSION["username"])) { ?>

<li>
    <form action="/logout" method="post">
     <button class="button logout-btn" type="submit">Logout</button>
    </form>
   </li>

<?php } ?>


  </ul>
</nav>
</div>
