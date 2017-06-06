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
  $productID = $_GET["productID"];
  $email = $_SESSION["email"];

  // Sanitize post Vars
  $street = mysqli_real_escape_string($conn, htmlspecialchars($_POST["address"]));
  $city = mysqli_real_escape_string($conn, htmlspecialchars($_POST["city"]));
  $zipcode = mysqli_real_escape_string($conn, htmlspecialchars($_POST["zipcode"]));
  $country = mysqli_real_escape_string($conn, htmlspecialchars($_POST["country"]));

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
          WHERE userID = '".$userID;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  // Add address if one doesnt exist
  if ($row["addressID"] == NULL) {
    $sql = "INSERT INTO Address (street, city, zipcode, country)
            VALUES ('".$street."', '".$city."', '".$zipcode."', '".$country."')";
    $result = mysqli_query($conn, $sql);
    $sql = // TODO: Store addressID in user table
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

  // Insert Purchase into Transaction
  $message = "You purchased a ".$_GET["productName"];
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
