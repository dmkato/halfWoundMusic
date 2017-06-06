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

  // Get product ID from link
  $productID = $_GET["productID"];
  $productName = $_GET["productName"];
  $email = $_SESSION["email"];

  //check logged in
  if ($_SESSION["username"] == "Not logged in") {
    $message =  "Please <a href='".$directory."/index.php'>Log in</a>";
  } else {

    // Get userID
    $sql = "SELECT userID
            FROM User
            WHERE email='".$email."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userID = $row["userID"];

    // Construct form
    $message = "
    <div id='formContainer' class='text-center'>
      <h3>Sign Up</h3>
      <form id='addressForm' action='purchase.php?productID=".$productID."&productName=".$prproductName." method='post'>
        <div id='Address' class='form-group'>
          <input name='address' class='form-control' id='address' placeholder='Address'>
        </div>
        <div id='city' class='form-group'>
          <input name='city' class='form-control' id='city' placeholder='City'>
        </div>
        <div id='zipCode' class='form-group'>
          <input name='zipcode' class='form-control' id='zipcode' placeholder='Zipcode'>
        </div>
        <div id='country' class='form-group'>
          <input name='country' class='form-control' id='country' placeholder='Country'>
        </div>
        <div>
          <input id='submitButton' type='submit' class='btn btn-default'>
        </div>
      </form>
    </div>";
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
