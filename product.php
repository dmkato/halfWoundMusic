<?php
session_start();

include 'config.php';
$dbhost = DBHOST;
$dbname = DBNAME;
$dbuser = DBUSER;
$dbpass = DBPASS;

?>
<!DOCTYPE html>
<html>
<?php
  $pageTitle = "product";
  include "php/header.php";
?>
<body>
	<?php include 'php/footer.php'; ?>		
</body>
</html>