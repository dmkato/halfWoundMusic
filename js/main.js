function formvalidate(myform) {
   var passcheckregex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
   if (passcheckregex.test(myform.userpassword.value)==false) {
      alert("Your password isn't in the right format (must contain at least one upper case letter and one digit (0-9)");
      myform.userpassword.focus();
      return false;
   }
   return true;
}


function formvalidate(myform) {
   if (myform.firstname.value == "") {
      alert("Firstname can't be blank");
      myform.firstname.focus();
      return false;
   } if (myform.lastname.value == "") {
      alert("Last name can't be blank");
      myform.lastname.focus();
      return false;
   } if (myform.email.value == "") {
      alert("email can't be blank");
      myform.email.focus();
      return false;
   } if (myform.username.value == "") {
      alert("Username can't be blank");
      myform.username.focus();
      return false;
   } if (myform.userpassword.value == "") {
      alert("password can't be blank");
      myform.userpassword.focus();
      return false;
   } if (myform.passwordconfirm.value == "") {
      alert("password can't be blank");
      myform.userpassword.focus();
      return false;
   } if (myform.userpassword.value != myform.passwordconfirm.value) {
      alert("Passwords do not match");
      myform.userpassword.focus();
      return false;
   }
   //password check. test() returns bool based off whether strings match
   else {
      var passcheckregex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
      if (passcheckregex.test(myform.userpassword.value)==false) {
         alert("Your password isn't strong enough (must contain at least one upper case letter and one digit (0-9)");
         myform.userpassword.focus();
         return false;
      }

   } if (document.getElementById("myCheck").checked==false) {
      alert("You must agree to privacy policy");
      myform.userpassword.focus();
      return false;
   }
   return true;
}
