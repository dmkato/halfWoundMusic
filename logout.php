<?php
session_start();
$_SESSION["username"]="Not logged in";


?>
<!DOCTYPE html>
<html>
<?php
  $pageTitle = "logout";
  include "php/header.php";
?>
<body>
	<?php include 'header.php'; ?>

	<?php include 'navigation.php';	?>

	<br>
	<h5>Your account has been logged out</h5>
	<br>
	
	<?php include 'php/footer.php'; ?>		
</body>
</html>