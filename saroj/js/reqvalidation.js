  function reqValidation() {

      var firstName = document.getElementById("firstname").value;
      var lastName = document.getElementById("lastname").value;
      var bloodGroup = document.getElementById("bloodgroups").value;
      var emailCheck = document.getElementById("emails").value;
      var phoneNumber = document.getElementById("numbers").value;
      var address = document.getElementById("address1").value;
      var messages = document.getElementById("message").value;

      if (firstName == "") {
        document.getElementById('fname').innerHTML = "** Please fill the firstName field.";
        return false;
      }
      if (lastName == "") {
        document.getElementById('lname').innerHTML = "** Please fill the firstName field.";
        return false;
      }
      if (bloodGroup == "") {
        document.getElementById('bloodgroup').innerHTML = "** Please select the Blood Group.";
        return false;
      }

      if (emailCheck == "") {
        document.getElementById('email').innerHTML = "** Please fill the email field.";
        return false;
      }
      if (emailCheck.indexOf('@') <= 0) {
        document.getElementById('email').innerHTML = "** @ Invalid Position";
        return false;
      }
      if ((emailCheck.charAt(emailCheck.length-4)!=='.') && (emailCheck.charAt(emailCheck.length-3)!=='.')) {
        document.getElementById('email').innerHTML = "** . Invalid Position.";
        return false;
      }

      if (phoneNumber == "") {
        document.getElementById('number').innerHTML = "** Please Enter your Phone Number.";
        return false;
      }

      if (phoneNumber <= 10) {
        document.getElementById('number').innerHTML = "** Your Phone Number should have at least 10 digit.";
        return false;
      }
      
      if (address == "") {
        document.getElementById('address').innerHTML = "** Please fill the address field.";
        return false;
      }
      if (messages == "") {
        document.getElementById('messages').innerHTML = "** Message field should not be empty";
        return false;
      }

}