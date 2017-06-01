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
  include "header.php";
?>

<?php
	
		
		// Create connection
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		//selected product stored with GET method 
		$productID = (int) $_GET['productID'];
		

		$sql = "SELECT productID, name, description, price FROM Product WHERE productID = $productID";
		$result = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($result);
		
		while($row = mysqli_fetch_assoc($result)) {
        	echo "<br>";

        	$imageID = (string) $row["productID"];
        
        	echo "<br><br>";

        	$imageLink = "../images/".$imageID.".jpeg";
        	echo '<img src="'.$imageLink.'" alt="Cover" style=\"width:304px;height:228px;\">';
        	echo "Name: ".$row["name"];
 
        	echo "     Description: ".$row["description"];
        	echo "     Price: $".$row["price"];
        	echo "    ";
        	echo "<a href=\"product.php?productID=".$imageID."\">Visit product page</a>";
        	echo "<br><br>";

        	

		}
		
		if($rows == 0)
		{
			echo "Selected product not found in the database";
		}
		mysqli_close($conn);


	
	echo "<br><br>";


?>

<body>
	<?php include 'footer.php'; ?>		
</body>
</html>