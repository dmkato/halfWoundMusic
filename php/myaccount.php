<?php
	$pageTitle = "myaccount";
	include "header.php";

	include 'config.php';
	$dbhost = DBHOST;
	$dbname = DBNAME;
	$dbuser = DBUSER;
	$dbpass = DBPASS;
?>
<!DOCTYPE html>
<html>
<body>

	<br>
	<div class="container">
		<h4>Account Information</h4>
		<?php
		$username = $_SESSION["username"];
		if ($_SESSION["username"] == "Not logged in") {
			echo "Please login to see account information";
			echo "<br><br>";
		} else {

			// Create connection
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "SELECT email, lastname, firstname FROM User WHERE email='$username'";
			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)) {
	        	echo "<br>";
	        	echo "Email: ".$row["email"];
	        	echo "<br><br>";
	        	echo "First name: ".$row["firstname"];
	        	echo "<br><br>";
	        	echo "Last name: ".$row["lastname"];

			}

			mysqli_close($conn);

		}
		echo "<br><br>";
		echo "<br><br>";
		echo "<br><br>";

		?>
	</div>

	<?php include 'footer.php'; ?>
</body>
</html>
