
$(function() {
   // $('#' + pageTitle).addClass("active");
})

function formvalidate(myform) {

   var passcheckregex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
   if (passcheckregex.test(myform.userpassword.value)==false) {
      alert("Your password isn't in the right format (must contain at least one upper case letter and one digit (0-9)");
      myform.userpassword.focus();
      return false;
}
   return true;
}
