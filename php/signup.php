<?php
$pageTitle = "signup";
include "header.php";
?>
<!DOCTYPE html>
<html>
<body>

  <br>
  <div id="signupForm" class="container">
    <br>
    <div id="formContainer" class="text-center">
      <h3>Sign Up</h3>
      <form id="signupForm" action="accountProcess.php" method="post" onsubmit="return formvalidate(this);">
        <div id="firstNameField" class="form-group">
          <input name="first" class="form-control" id="firstname" placeholder="First Name">
        </div>
        <div id="lastNameField" class="form-group">
          <input name="last" class="form-control" id="lastname" placeholder="Last Name">
        </div>
        <div id="emailAddressField" class="form-group">
          <input name="email" class="form-control" id="email" placeholder="Email Address">
        </div>
        <div id="passwordField" class="form-group">
          <input type="password" name="password" class="form-control" id="userpassword" placeholder="Password">
        </div>
        <div id="passwordField" class="form-group">
          <input type="password" name="password" class="form-control" id="passwordconfirm" placeholder="Confirm Password">
        </div>
        <div>
          <input id="submitButton" type="submit" class="btn btn-default">
          <span id="ajaxStatus"></span>
        </div>
      </form>
    </div>
  </div>

  <?php include 'footer.php'; ?>
</body>
</html>
