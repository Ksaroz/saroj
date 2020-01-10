function validation() {

      var userName = document.getElementById("username").value;
      var passWord = document.getElementById("password").value;
      var confirmPass = document.getElementById("confirmPassword").value;
      var emailCheck = document.getElementById("emailid").value;

      if (userName == "") {
        document.getElementById('user').innerHTML = " ** Please fill the username field";
        return false;
      }
      if ((userName.length <= 2) || (userName.length > 20)) {
        document.getElementById('user').innerHTML = "** username must be b/w 3 and 20 char.";
        return false;
      }
      if (!isNaN(userName)) {
        document.getElementById('user').innerHTML = "** Only characters are allowed.";
        return false;
      }


      if (passWord == "") {
        document.getElementById('pass').innerHTML = " ** Please fill the password field";
        return false;
      }
      if ((passWord.length <= 2) || (passWord.length > 20)) {
        document.getElementById('pass').innerHTML = "** Password must be b/w 3 and 20 char.";
        return false;
      }


      if (confirmPass == "") {
        document.getElementById('conpass').innerHTML = " ** Please fill the confirm field";
        return false;
      }
      if (passWord !== confirmPass) {
        document.getElementById('conpass').innerHTML = " ** Password are not matched";
        return false;
      }

      if (emailCheck == "") {
        document.getElementById('emails').innerHTML = " ** Please fill the email field";
        return false;
      }
      if (emailCheck.indexOf('@') <= 0) {
        document.getElementById('emails').innerHTML = "** @ Invalid Position";
        return false;
      }
      if ((emailCheck.charAt(emailCheck.length-4)!=='.') && (emailCheck.charAt(emailCheck.length-3)!=='.')) {
        document.getElementById('emails').innerHTML = "** . Invalid Position";
        return false;
      }
      

 }

