<?php
session_start();

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

//check username and password
//sanitize inputs
//$theusername = mysqli_real_escape_string($conn, $_POST["user"]);

$theusername = $_POST["user"];
$thepassword = mysqli_real_escape_string($conn, $_POST["password"]);

//hash password
$thepassword = md5($thepassword);

//select username + password from table
$sql = "SELECT email FROM User WHERE email='$theusername' and password='$thepassword'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head lang="en">

</head>
<body>
<?php
  $pageTitle = "loginprocess";
  include "header.php";
?>

	<br>


	<?php
	if($rows==1)
	{
		echo "<br>";
		echo "You are now logged in";
		echo "<br>";
		$_SESSION["username"] = $theusername;
		echo "<br>";
	}
	else {
		echo "<br>";
		echo "Invalid username or password";
		echo "<br>";
	}


//echo "Welcome " . $_SESSION["username"] . ".<br>";
	?>
	<br>
	<?php include 'footer.php'; ?>
</body>
</html>
