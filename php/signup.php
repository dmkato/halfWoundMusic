<?php
  $pageTitle = "signup";
  include "header.php";
?>
<!DOCTYPE html>
<html>
<body>

	<br>

	<br>
	<h3>Sign-up</h3>
	<script type="text/javascript">

		function formvalidate(myform)
		{
			if(myform.firstname.value == "")
			{
				alert("Firstname can't be blank");
				myform.firstname.focus();
				return false;
			}
			if(myform.lastname.value == "")
			{
				alert("Last name can't be blank");
				myform.lastname.focus();
				return false;
			}
			if(myform.email.value == "")
			{
				alert("email can't be blank");
				myform.email.focus();
				return false;
			}
			if(myform.username.value == "")
			{
				alert("Username can't be blank");
				myform.username.focus();
				return false;
			}
			if(myform.userpassword.value == "")
			{
				alert("password can't be blank");
				myform.userpassword.focus();
				return false;
			}
			if(myform.passwordconfirm.value == "")
			{
				alert("password can't be blank");
				myform.userpassword.focus();
				return false;
			}
			if(myform.userpassword.value != myform.passwordconfirm.value)
			{
				alert("Passwords do not match");
				myform.userpassword.focus();
				return false;
			}
	//password check. test() returns bool based off whether strings match
	else
	{
		var passcheckregex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
		if(passcheckregex.test(myform.userpassword.value)==false)
		{
			alert("Your password isn't strong enough (must contain at least one upper case letter and one digit (0-9)");
			myform.userpassword.focus();
			return false;
		}

	}
	if(document.getElementById("myCheck").checked==false)
	{
		alert("You must agree to privacy policy");
		myform.userpassword.focus();
		return false;
	}
	return true;
}


</script>

<form action = "accountProcess.php" method="post" onsubmit="return formvalidate(this);">
	<fieldset>

		<label>First name</label>
		<input type = "text"  name = "first" id = "firstname" ><br>
		<br>
		<label>Last name</label>
		<input type = "text"  name = "last" id = "lastname" ><br>
		<br>
		<label>Email</label>
		<input type = "text"  name = "email" id = "email" ><br><br>
		<label>Password</label>
		<input type = "password"  name = "password" id = "userpassword" ><br>
		<br>
		<label>Password Confirm</label>
		<input type = "password"  name = "passwordconfirm" id = "userpasswordconfirm" >
		<br><br><input type="checkbox" name="privacypolicy" id="myCheck"> I agree to the privacy policy<br>
		<br><br>
		<input type="submit">

	</fieldset>
</form>

<?php include 'footer.php'; ?>
</body>
</html>
