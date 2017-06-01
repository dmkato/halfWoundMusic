<?php
session_start();
$_SESSION["username"]="Not logged in";


?>
<!DOCTYPE html>
<html>
<?php
  $pageTitle = "logout";
  include "header.php";
?>
<body>

	<br>
	<h5>Your account has been logged out</h5>
	<br>

	<?php include 'footer.php'; ?>
</body>
</html>
