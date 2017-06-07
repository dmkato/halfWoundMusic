<?php
$pageTitle = "myaccount";
include "header.php";
include 'config.php';

?>
<!DOCTYPE html>
<html>
<body>

	<br>
	<div class="container text-center">
		<?php
		$username = $_SESSION["username"];
		if ($_SESSION["username"] == "") {
			echo "Please <a href='".$directory."/index.php'>login</a> to see account information";
		} else {

			// Create connection
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "SELECT email, lastname, firstname, userID FROM User WHERE email='".$_SESSION['email']."'";
			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_assoc($result);
			$userID = $row["userID"];
			echo "<div class='container row'>";
			echo "<div class='col-md-6 text-center'>";
			echo "<h3>Account Information</h3>";
			echo "<br><br>";
			echo "Email: ".$row["email"];
			echo "<br><br>";
			echo "First name: ".$row["firstname"];
			echo "<br><br>";
			echo "Last name: ".$row["lastname"];
			echo "<br><br>";
			echo "<br><br>";
			echo "</div>";

			// Select Purchases
			$sql = "SELECT Product.brandName, Product.name, Transaction.purchaseDate
			FROM Product
			INNER JOIN Purchase ON Product.productID = Purchase.productID
			INNER JOIN Transaction ON Purchase.transactionID = Transaction.transactionID
			WHERE Transaction.userID = ".$userID."
			ORDER BY Transaction.purchaseDate";
			$result = mysqli_query($conn, $sql);
			echo "<div class='col-md-6 text-center'>";
			echo "<h3>Purchases</h3>";
			echo "<br><br>";
			echo "<table class='table'><thead>
			<tr><th>Date</th><th>Product</th><th>
				Quantity</th></tr></thead><tbody>";

			// Print purchases to screen
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$row["purchaseDate"]."</td>";
					echo "<td>".$row["brandName"]." ".$row["name"]."</td>";
					echo "<td>1</td>";
					echo "</tr>";
				}
				echo "</table></div>";
				mysqli_close($conn);

			}

			echo "<br><br>";
			echo "<br><br>";
			echo "<br><br>";

			include 'footer.php';

			?>
		</div>
	</body>
	</html>
