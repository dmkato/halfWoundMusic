<?php
session_start();

include 'php/config.php';
$dbhost = DBHOST;
$dbname = DBNAME;
$dbuser = DBUSER;
$dbpass = DBPASS;
?>

<!DOCTYPE html>
<html>
<?php
  $pageTitle = "shop";
  include "php/header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php

      		// Create connection
      		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      		// Check connection
      		if (!$conn)
      			die("Connection failed: " . mysqli_connect_error());

      		$sql = "SELECT productID, name, description, price FROM Product";
      		$result = mysqli_query($conn, $sql);

      		while($row = mysqli_fetch_assoc($result)) {
            $imageID = (string) $row["productID"];
            $imageLink = "../images/".$imageID.".jpeg";

            echo "<div class='productRow row'>";
          	echo "<div class='col-md-4'>";
          	echo "<img src=".$imageLink." alt='Cover' style='width:100%; height:100%;'>";
            echo "</div><div class='col-md-8'>";
          	echo "Name: ".$row["name"];
          	echo "     Description: ".$row["description"];
          	echo "     Price: $".$row["price"];
          	echo "    ";
          	echo "<a href='product.php?productID=".$imageID."'>Visit product page</a>";
          	echo "</div></div>";
      		}

      		mysqli_close($conn);

      	echo "<br><br>";
      ?>
    </div>
  </div>
</div>

	<?php include 'php/footer.php'; ?>
</body>
</html>
