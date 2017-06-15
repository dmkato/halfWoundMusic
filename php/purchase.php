<?php
  $pageTitle = "Purchase";
  include "header.php";
  include 'config.php';

  // Create connection
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Set Timezone
  date_default_timezone_set('America/Los_Angeles');

  // Get product ID from link
  $productID = $_POST["productID"];
  $email = $_SESSION["email"];

  // Sanitize post Vars
  $street =  htmlspecialchars($_POST["address"]);
  $city = htmlspecialchars($_POST["city"]);
  $zipcode =  htmlspecialchars($_POST["zipcode"]);
  $country =  htmlspecialchars($_POST["country"]);

  $street = mysqli_real_escape_string($conn, $street);
  $city = mysqli_real_escape_string($conn, $city);
  $zipcode = mysqli_real_escape_string($conn, $zipcode);
  $country = mysqli_real_escape_string($conn, $country);

  // Get userID
  $sql = "SELECT userID
          FROM User
          WHERE email='".$email."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $userID = $row["userID"];

  // Check if user Address exists
  $sql = "SELECT addressID
          FROM User
          WHERE userID = '".$userID."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  // Add address if one doesnt exist
  if ($row["addressID"] == 0) {
    $sql = "INSERT INTO Address (street, city, zipcode, country)
            VALUES ('".$street."', '".$city."', ".$zipcode.", '".$country."'); SELECT SCOPE_IDENTITY();";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT addressID FROM Address
            WHERE street = '".$street."' AND city = '".$city."' AND zipcode = '".$zipcode."' AND country = '".$country."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $addrID = $row["addressID"];
    $sql = "UPDATE User
            SET addressID = ".$addrID."
            WHERE userID = ".$userID;
    $result = mysqli_query($conn, $sql);
  }


  // Check if transaction is open for the day
  $sql = "SELECT *
          FROM Transaction
          WHERE userID = '".$userID."' AND purchaseDate = '".date('m/d/y')."'";
  $result = mysqli_query($conn, $sql);
  $numRows = mysqli_num_rows($result);

  // Create transaction
  if ($numRows == 0) {
    $sql = "INSERT INTO Transaction (purchaseDate, userID)
            VALUES ('".date('m/d/y')."', ".$userID.")";
    mysqli_query($conn, $sql);
  }

  // Get transactionID
  $sql = "SELECT transactionID
          FROM Transaction
          WHERE userID=".$userID." AND purchaseDate='".date('m/d/y')."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $transactionID = $row["transactionID"];

  //Insert Purchase
  $sql = "INSERT INTO Purchase (transactionID, productID, quantity)
          VALUES (".$transactionID.", ".$productID.", 1)";
  $result = mysqli_query($conn, $sql);

  //decrease stock
  $sql = "UPDATE Product
          SET stock = stock - 1
          WHERE productID = $productID";
  $result = mysqli_query($conn, $sql);

  // Insert Purchase into Transaction
  $message = "You purchased a ".$_POST["productName"];
  mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
<head lang="en">

</head>
<body>
  <div class="container">
  <br>
  <?php
    echo "<br>";
    echo $message;
    echo "<br>";

  ?>
  <br>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
