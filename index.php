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

<div id="contentBlock" class="container">
  <div class="row">
    <div class="col-md-9">
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
        echo "<a href='/php/product.php?productID=".$imageID."'>Visit product page</a>";
        echo "</div></div>";
      }

      mysqli_close($conn);

      echo "<br><br>";
      ?>
    </div>


    <div id="formContainer" class="col-md-3">
      <form id="signupForm" action = "php/loginProcess.php" method="post" onsubmit="return formvalidate(this);">

        <h3>Login</h3>
        <div id="emailField" class="form-group">
          <input name="user" class="form-control" id="email" placeholder="Email">
        </div>
        <div id="passwordField" class="form-group">
          <input name="password" class="form-control" id="userpassword" placeholder="Password">
        </div>

        <div>
          <input id="submitButton" type="submit" class="btn btn-default">
          <span id="ajaxStatus"></span>
        </div>

      </form>
    </div>
    <br><br><br>
  </div>
</div>

<?php include 'php/footer.php'; ?>
</body>
</html>
