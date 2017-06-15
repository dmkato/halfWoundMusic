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

  // check logged in
  if ($_SESSION["username"] == "") {
    $message =  "Please <a href='".$directory."/index.php'>Log in</a> to view this product";
  } else {

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
            WHERE userID = '$userID'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Add address if one doesnt exist
    if ($row["addressID"] == 0) {

      // Construct form
      $message = "
      <div class='outerForm'>
      <div id='formContainer' class='text-left'>
        <div class='addressForm'>
          <h3>Shipping Address</h3>
          <form id='addressForm' action='purchase.php' method='post'>
            <div class='form-group'>
              <input name='address' class='form-control' id='address' placeholder='Address'>
            </div>
            <div class='form-group'>
              <input name='city' class='form-control' id='city' placeholder='City'>
            </div>
            <div class='form-group'>
              <input name='zipcode' class='form-control' id='zipcode' placeholder='Zipcode'>
            </div>
            <div class='form-group'>
              <input name='country' class='form-control' id='country' placeholder='Country'>
            </div>
            <input type='hidden' name='productID' value='$productID'>
            <input type='hidden' name='productName' value='$productName'>
            <div>
              <input id='submitButton' type='submit' class='btn btn-default'>
            </div>
          </form>
        </div>
      </div>
      </div>";
  } else {
      $message = "
        <form id='hiddenForm' action='purchase.php' method='post'>
          <input type='hidden' name='productID' value='$productID'>
          <input type='hidden' name='productName' value='$productName'>
        </form>
    ";
  }
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
