<?php
  $pageTitle = "login";
  include "header.php";
?>
<!DOCTYPE html>
<html>
<body>

	<br>
  <div class="text-center container">

  	<h3>Login</h3>

  	<form action = "loginProcess.php" method="post" onsubmit="return formvalidate(this);">
  		<fieldset>

  			<label>E-mail</label>
  			<input type="text"  name="user" id="username"><br>
  			<br>
  			<label>Password</label>
  			<input type="password"  name="password" id="userpassword" ><br>

  			<br><br>
  			<input type="submit">

  		</fieldset>
  	</form>
  </div>

	<?php include 'footer.php'; ?>
</body>
</html>
