function inqValidation() {

      var firstName = document.getElementById("firstname").value;
      var lastName = document.getElementById("lastname").value;
      var emailCheck = document.getElementById("emails").value;
      var subject = document.getElementById("subject").value;
      var messages = document.getElementById("message").value;

      if (firstName == "") {
        document.getElementById('fname').innerHTML = " ** Please fill the firstName field";
        return false;
      }
      if (lastName == "") {
        document.getElementById('lname').innerHTML = "** Please fill the firstName field.";
        return false;
      }
      
      if (emailCheck == "") {
        document.getElementById('email').innerHTML = " ** Please fill the email field";
        return false;
      }
      if (emailCheck.indexOf('@') <= 0) {
        document.getElementById('email').innerHTML = "** @ Invalid Position";
        return false;
      }
      if ((emailCheck.charAt(emailCheck.length-4)!=='.') && (emailCheck.charAt(emailCheck.length-3)!=='.')) {
        document.getElementById('email').innerHTML = "** . Invalid Position";
        return false;
      }

      if (subject == "") {
        document.getElementById('subjects').innerHTML = " ** Please fill the subject field";
        return false;
      }
      
      if (messages == "") {
        document.getElementById('messages').innerHTML = " ** Message field should not be empty";
        return false;
      }

}