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

<div class="container">
  <div class="row">
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
        	$imageID = (string) $row["productID"];

        	echo "<br><br>";
        	$imageLink = "../images/".$imageID.".jpeg";
          echo "<div class='productImage col-md-4'>";
        	echo '<img src="'.$imageLink.'" alt="Cover" style=\"width:500px;height:500px;\">';
          echo "</div>";
          echo "<div class='col-md-8'><ul>";
          echo "<li><h3>".$row["name"]."<span class='price'>$".$row["price"]."</span></h3></li>";
        	echo "<li>".$row["description"];
          echo "<span class='purchaseBtnSpan'><a href='purchase.php?productID=".$productID."&productName=".$row["name"]."' class='btn btn-default purchaseBtn'>Purchase</a></span></li>";
          echo "</ul></div>";
        	echo "<br><br>";
		}

		if($rows == 0)
		{
			echo "Selected product not found in the database";
		}

    // Display Reviews
		mysqli_close($conn);



	echo "<br><br>";


?>
</div>
</div>

<body>
	<?php include 'footer.php'; ?>
</body>
</html>
