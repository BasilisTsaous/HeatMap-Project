<!DOCTYPE html>
<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}


/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
  border: 1px solid #ccc; 
  border-radius:50px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" icon when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
<?php
include("header.php"); 
?>
<html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<script>
	$(document).ready(function(){
			$("#signup").click(function(){
				var first = $("#first").val();
				var last = $("#last").val();
				var email = $("#email").val();
				var pass = $("#pass").val();
				
				
				if(first != "" && last != "" && email!= "" && pass!= ""){
					$.ajax({
						url:'register_server.php',
						type: 'POST',
						data:{first:first, last:last, email:email, pass:pass, signup: true},
						success:function(response){
							console.log(response);
							if(response == 1){
								window.location = "user.php";
							}					
							else{
								alert("Incorrect information or user already exists");
							}
						}
					});
				}
				else{
					alert("Please fill in the selected element of the form");
				}
			});
	});    	
</script>
<body>

<div class="container">
  <form action="">
  <hr>
    <img src="images/register.png" style="width:100px; height:100px; margin-top:-40px;"><h1>User Registration Form</h1>
    <p>Please fill out the form below to create an account</p>
    <hr>

    <label for="firstname"><b>Firstname</b></label>
    <input type="text" placeholder="Firstname" name="first" id="first" required>
	 
	<label for="lastname"><b>Lastname</b></label>	  
    <input type="text" placeholder="Lastname" name="last" id="last" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Email" name="email" id="email" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Password" name="pass" id="pass" pattern="(?=.*\d)([$&+,:;=?@#|'<>.^*()%!-])(?=.*[A-Z]).{8,}" title="Must contain at least one number,one uppercase letter,a symbol and at least 8 or more characters">
	<br><br>
     <div class="clearfix">
	     <button type="button" class="cancelbtn" onclick="window.location='index.php';">CANCEL</button>
		 <button type="button" class="signupbtn" id = "signup" name="signup">SIGN UP</button>
      </div>
	  
	  <div id="message" style="text-align:left;">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>symbol</b></p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
      </div>
 </form>	  
</div>

<script>
var myInput = document.getElementById("pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function(){
	document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function(){
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
//myInput.onkeyup = function register_function() {
myInput.onkeyup = function(){
  // Validate symbols
  var symbols = /[$&+,:;=?@#|'<>.^*()%!-]/g;
  if(myInput.value.match(symbols)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</body>
</html>


