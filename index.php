<?php
include 'php/config.php';
$pageTitle = "shop";
include "php/header.php";
?>

<div id="contentBlock" class="container">
  <div class="row">
      <?php

      // Create column
      echo $username;
      if ($username == "Guest") {
        echo "<div class='productContainer col-md-9'>";
      } else {
        echo "<div class='productContainer col-md-12'>";
      }

      // Create connection
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      // Check connection
      if (!$conn)
      die("Connection failed: " . mysqli_connect_error());

      $sql = "SELECT productID, name, description, price, brandName FROM Product";
      $result = mysqli_query($conn, $sql);

      while($row = mysqli_fetch_assoc($result)) {
        $imageID = (string) $row["productID"];
        $imageLink = "images/".$imageID.".jpeg";

        echo "<div class='centered'>";
        echo  "<div class='productRow row'>";
        echo    "<div class='col-md-3 text-center'>";
        echo      "<img src=".$imageLink." alt='Cover' style='width:100%; height:auto;'>";
        echo    "</div>";
        echo    "<div class='col-md-9'>";
        echo      "<a href='".$directory."/php/product.php?productID=".$imageID."'><h3> ".$row["brandName"]." ".$row["name"]."</h3>";
        echo      " $".$row["price"]."</a>";
        echo    "</div>";
        echo   "</div><br>";
      }

      mysqli_close($conn);

      echo "<br><br></div></div></div>";

      if ($username == "Guest") {
        echo "<div id='formContainer' class='col-md-3'>
          <form class='Form' action = 'php/loginProcess.php' method='post' onsubmit='return formvalidate(this);'>

            <h3>Login</h3>
            <div id='emailField' class='form-group'>
              <input type='email' name='user' class='form-control' id='email' placeholder='Email'>
            </div>
            <div id='passwordField' class='form-group'>
              <input type='password' name='password' class='form-control' id='userpassword' placeholder='Password'>
            </div>
            <a href='".$directory."/php/signup.php'>Don't Have an account? Sign up!</a>
            <div>
              <input id='submitButton' type='submit' class='btn btn-default'>
              <span id='ajaxStatus'></span>
            </div>

          </form>
        </div>";
      }
      echo "</div>";
      include 'php/footer.php';
    ?>
    <br><br><br>
</body>
</html>
