<?php
session_start();
$_SESSION["username"]="";


?>
<!DOCTYPE html>
<html>
<?php
  $pageTitle = "logout";
  include "header.php";
?>
<body>

  <div class="container">
	<br>
	<h5>Your account has been logged out</h5>
	<br>
  </div>

	<?php include 'footer.php'; ?>
</body>
</html>
