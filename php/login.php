<!DOCTYPE html>
<html>
<?php
  $pageTitle = "login";
  include "php/header.php";
?>
<body>

	<br>
	<h3>Login</h3>	
	<script type="text/javascript">

		function formvalidate(myform)
		{

			var passcheckregex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/; 
			if(passcheckregex.test(myform.userpassword.value)==false)
			{
				alert("Your password isn't in the right format (must contain at least one upper case letter and one digit (0-9)");
				myform.userpassword.focus();
				return false;
			}

			return true;
		}


	</script>

	<form action = "loginProcess.php" method="post" onsubmit="return formvalidate(this);">
		<fieldset>                    
								
			<label>E-mail</label>	
			<input type = "text"  name = "user" id = "username" ><br>	
			<br>						
			<label>Password</label>	
			<input type = "password"  name = "password" id = "userpassword" ><br>

			<br><br>
			<input type="submit">

		</fieldset>
	</form>

	<?php include 'php/footer.php'; ?>
</body>
</html>