<?php include('backend.php') ?>
<!DOCTYPE html>
<head>

<title>My Form</title>

<style>
:root{
    --success-color:#2ecc71;
    --error-color: #e74c3c;
}

*{
    box-sizing: border-box;
}
body{
    background-color: #f9fafb;
    font-family:'Open Sans',sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
}
.container{
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0,0,0, 0.3);
    width: 400px;

}
h1{
    text-align: center;
    margin: 0 0 20px;
}
.myform{

    padding: 30px 40px;

}
.myform-control{

    margin-bottom: 10px;
    padding-bottom: 20px;
    position: relative;
}
.myform-control label{

   color: #777;
   display: block;
   margin-bottom: 5px;
}
.myform-control input{
    border: 2px solid  #f0f0f0;
    border-radius: 4px;
    width: 100%;
    padding: 10px;
    font-size: 14px;

}
.myform-control input:focus{
    outline: 0;
    border-color: #777;
}
.myform-control.success input{

    border-color:var(--success-color);

}
.myform-control.error input{
    border-color:var(--error-color);
}

.myform-control small{
    color: var(--error-color);
    position: absolute;
    bottom: 0;
    left: 0;
    visibility: visible;
}

.myform button{
    cursor: pointer;
    background-color: #3498db;
    border: 2px sold #3498db;
    border-radius: 4px;
    color: #fff;
    display: block;
    font-size: 16px;
    padding: 10px;
    margin-top: 10px;
    width: 100%;
}
</style>

</head>

<body>

<script> 

function validateUsername(){
  var username = document.myform.username.value;
  if(username ==""){
    document.getElementById("1").innerHTML="Please fill the username field"; 
    return false;
  }
  else{
    document.getElementById("1").innerHTML="";
  }

  if(username.length <= 2 || username.length > 20){
    document.getElementById("1").innerHTML="Username length must be between 2 to 20";
    return false;
  }
  else{
    document.getElementById("1").innerHTML="";
  }

var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";

for (var i = 0; i < document.myform.username.value.length; i++) {
  if (iChars.indexOf(document.myform.username.value.charAt(i)) != -1) {
      document.getElementById("1").innerHTML="Your username has special characters. \nThese are not allowed.\n Please remove them and try again.";
      return false;
   }
  else{
    document.getElementById("1").innerHTML="";
  }    
}
}

function validatePassword(){
  var password = document.myform.password.value;
  
  if(password ==""){
    document.getElementById("2").innerHTML="Please fill the password field"; 
    return false;
  }
  else{
    document.getElementById("2").innerHTML="";
  }

  var passwordformat = /^(?=(.*[a-z]){3,})(?=(.*[A-Z]){1,})(?=(.*[0-9]){1,})(?=(.*[!@#$%^&*()\-__+.]){1,}).{6,}$/;
  if(!(passwordformat.test(password))){
    document.getElementById("2").innerHTML="Incorrect password format. \nPassword must contain 3 lowercase letters, 1 uppercase letter, 1 digit and 1 special case character.";
    return false;
  }
  else{
   document.getElementById("2").innerHTML="";
  }
}

function validatePassword2(){
 
  var password = document.myform.password.value;
  var password2 = document.myform.password2.value;
  if(password2 ==""){
    document.getElementById("3").innerHTML="Please re-enter the password"; 
    return false;
  }
  else{
    document.getElementById("3").innerHTML="";
  }

  if(password!==password2){
    document.getElementById("3").innerHTML="Passwords do not match";
    return false;
  }
  else{
    document.getElementById("3").innerHTML="";
  }
}

function validateDate(){
  var date = document.myform.date.value;
  if(date ==""){
    document.getElementById("4").innerHTML="Please fill the birthday field"; 
    return false;
  }
  else{
    document.getElementById("4").innerHTML="";
  }
  
    let dateformat = /^(0?[1-9]|1[0-2])[\/](0?[1-9]|[1-2][0-9]|3[01])[\/]\d{4}$/;      
          
    // Match the date format through regular expression      
    if(date.match(dateformat)){      
        let operator = date.split('/');      
      
        // Extract the string into month, date and year      
        let datepart = [];      
        if (operator.length>1){      
            pdatepart = date.split('/');      
        }      
        let month= parseInt(datepart[0]);      
        let day = parseInt(datepart[1]);      
        let year = parseInt(datepart[2]);      
              
        // Create list of days of a month      
        let ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];      
        if (month==1 || month>2){      
            if (day>ListofDays[month-1]){      
                ///This check is for Confirming that the date is not out of its range      
                return false;      
            }      
        }else if (month==2){      
            let leapYear = false;      
            if ( (!(year % 4) && year % 100) || !(year % 400)) {      
                leapYear = true;      
            }      
            if ((leapYear == false) && (day>=29)){      
                return false;      
            }else      
            if ((leapYear==true) && (day>29)){      
                document.getElementById("4").innerHTML="";      
                return false;      
            }      
        }      
    }else{      
        document.getElementById("4").innerHTML="Invalid date format!";      
        return false;      
    }
}            
    

function validatePhone(){
  var phone = document.myform.phone.value;
  if(phone ==""){
    document.getElementById("5").innerHTML="Please enter a phone number";
    return false;
  }
  else{
    document.getElementById("5").innerHTML="";
  }

  if(isNaN(phone)){
    document.getElementById("5").innerHTML="Only digits are allowed";
    return false;
  }
  else{
    document.getElementById("5").innerHTML="";
  }

  var phoneformat = /^(?:(([+]|00)92)|0)((3[0-6][0-9]))(\d{7})$/;
  if(!(phoneformat.test(phone))){
    document.getElementById("5").innerHTML="Please enter valid phone format";
    return false;
  }
  else{
    document.getElementById("5").innerHTML="";
  }
}


function validateEmail(){
  var email = document.myform.email.value;
  if(email ==""){
    document.getElementById("6").innerHTML="Please fill the email field";
    return false;
  }
  else{
    document.getElementById("6").innerHTML="";
  }
	
  var emailpattern=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if(!(emailpattern.test(email))){
    document.getElementById("6").innerHTML="Please enter a valid email";
    return false;
  }
  else{
   document.getElementById("6").innerHTML="";
  }

}


</script>  


<div class="container">
  <form name="myform" id="myform" class="myform" action="homepage.php" autocomplete="off" method="post" onsubmit="return !!(validateUsername() & validatePassword() & validatePassword2() & validateDate() & validatePhone() & validateEmail());">
  <h1>SIGN UP</h1>
  
  <div class="myform-control">  
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" onblur="return validateUsername();"><br><br>
    <small id="1"></small>
  </div><br><br>

  <div class="myform-control">  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" onblur="return validatePassword();"><br><br><br>
    <small id="2"></small>
  </div><br><br>

  <div class="myform-control">  
    <label for="password2">Re-Enter Password:</label>
    <input type="password" id="password2" name="password2" onblur="return validatePassword2();">
    <small id="3"></small>
  </div><br><br>

  <div class="myform-control"> 
    <label for="birthday">Enter your birthday</label>
    <input type="text" id="date" name="birthday" placeholder="mm/dd/yyyy" onblur="return validateDate();">
    <small id="4"></small>
  </div><br><br>

  <div class="myform-control"> 
    <label for="phone">Enter your Phone number</label>
    <input type="text" id="phone" name="phone" onblur="validatePhone();">
    <small id="5"></small>
  </div><br><br>

  <div class="myform-control"> 
    <label for="email">Enter your email:</label>
    <input type="text" id="email" name="email" placeholder="abc@gmail.com" onblur="return validateEmail();"><br><br>
    <small id="6"></small>
  </div><br><br>

    <input type="submit" value="Register" id="register" name="register">
    <input type="reset" value="Reset" id="reset">

	<p>
  		Already a member? <a href="loginpage.php">Sign in</a>
  	</p>

  </form>
</div>
</body>
</html>