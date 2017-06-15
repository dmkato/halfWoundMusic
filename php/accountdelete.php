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
	
	echo "<br>";
	//echo "user id is: ".$userID;
	echo "<br>";

	//check if user has purchases (if userID matches row in transaction table)
	$sql = "SELECT userID FROM Transaction WHERE userID = $userID";
	$result = mysqli_query($conn, $sql);
	$numRows = mysqli_num_rows($result);

	if($numRows > 0) {
		echo "You can't fully delete an account with associated purchases. Would you like to permanently disable your account?    ";
		echo "<a href='accountdisable.php' class='btn btn-default deleteaccountBtn'>Disable</a>";
	}
	else {
		$sql = "DELETE FROM User WHERE userID = $userID";
		$result = mysqli_query($conn, $sql);
		echo "Account deleted";
		$_SESSION["username"]="";
	}

	mysqli_close($conn);

	?>
	

	</div>

	<?php include 'footer.php'; ?>
</body>
</html>