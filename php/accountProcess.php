<?php
  $pageTitle = "accountProcess";
  include "header.php";
?>
<!DOCTYPE html>
<html>
<body>
  <div class="container">


	<?php
	include 'config.php';
	$dbhost = DBHOST;
	$dbname = DBNAME;
	$dbuser = DBUSER;
	$dbpass = DBPASS;

	// Create connection
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$theusername = $_POST["email"];
	//check username
	//sanitize inputs
	$theusername = mysqli_real_escape_string($conn, $_POST["email"]);
	//select username from table
	$sql = "SELECT email FROM User WHERE email='$theusername'";
	$result = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($result);
	if($rows!=1)
	{


		$thepassword = htmlspecialchars($_POST["password"]);
		$thefirstName = htmlspecialchars($_POST["first"]);
		$thelastName = htmlspecialchars($_POST["last"]);
		$theemail = htmlspecialchars($_POST["email"]);

		$thepassword = mysqli_real_escape_string($conn, $thepassword);
		$thefirstName = mysqli_real_escape_string($conn, $thefirstName);
		$thelastName = mysqli_real_escape_string($conn, $thelastName);
		$theemail = mysqli_real_escape_string($conn, $theemail);
		echo "<br>";

		echo "<br>";
		$_SESSION["username"] = $theemail;

		//hash password
		$thepassword = md5($thepassword);

		//insert info
		$sql = "INSERT INTO User (email, password, lastname, firstname) VALUES ('$theemail', '$thepassword', '$thefirstName', '$thelastName')";

		if (mysqli_query($conn, $sql)) {
			echo "Your account information has been saved!";
			echo "<br>";

		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}


	}
	else {
		echo "<br>";
		echo "That username is already in use";
		echo "<br>";
	}

	mysqli_close($conn);
	?>
</div>

	<?php include 'footer.php'; ?>
</body>
</html>
