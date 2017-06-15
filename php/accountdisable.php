<?php
session_start();



?>
<!DOCTYPE html>
<html>
<?php
$pageTitle = "logout";
include "header.php";
include 'config.php';
?>
<body>
	<div class="container">
		<?php
		$username = $_SESSION["username"];
		$disableGarbagePass = (string) md5('sdf097sdf97sdfknklnweoiuy6zclkj908zlkjnzxclikh');


			// Create connection
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		//get userID
		$sql = "SELECT userID FROM User WHERE email='".$_SESSION['email']."'";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_fetch_assoc($result);
		$userID = $rows["userID"];

		$sql = "UPDATE User SET password = '$disableGarbagePass' WHERE userID = $userID";
		$result = mysqli_query($conn, $sql);

		echo "<br>";
		echo "Login disabled";
		$_SESSION["username"]="";

		mysqli_close($conn);

		?>


	</div>

	<?php include 'footer.php'; ?>
</body>
</html>