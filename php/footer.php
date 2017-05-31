<?php
session_start();
if($_SESSION["username"] == "Not logged in") {
  $username = "";
  
}
else {
  $username = $_SESSION["username"];
  
}

?>

</body>
<footer>
  <div class="container navbar navbar-fixed-bottom">
      <ul class="list-inline text-center">
        <li><?php echo "$username"; ?></li>
        <li><a href="#">Legal</a></li>
      </ul>
  </div>
</footer>
</html>
