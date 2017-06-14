<?php
  $pageTitle = "Review";
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
  $reviewText = $_POST["reviewText"];
  $numStars = $_POST["numStars"];

  if ($email == "") {
    $message = "Please <a href='".$directory."/index.php'>login</a> to review this item";
  } else {

    // Sanitize post Vars
    $reviewText = mysqli_real_escape_string($conn, htmlspecialchars($reviewText));

    // Get userID
    $sql = "SELECT userID
            FROM User
            WHERE email='".$email."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userID = $row["userID"];


    //Insert Review
    $sql = "INSERT INTO Review (numStars, reviewText, userID, productID)
            VALUES ($numStars, '$reviewText', $userID, $productID)";
    $result = mysqli_query($conn, $sql);

    // Insert Purchase into Transaction
    $message = "Review Posted!";
  }
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
