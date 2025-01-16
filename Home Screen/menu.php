<html lang="en">
<head>
  <title>Web 2019-2020</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>



<script>
	$(document).ready(function(){
		$("#submit").click(function(){
			var email = $("#em").val();
			var pass = $("#pwd").val();
			
			if(email != "" && pass != ""){
				$.ajax({
					url:'login.php',
					type: 'post',
					data:{email:email, pass:pass},
					success:function(response){
						if(response == 2){
							window.location = "admin.php";
						}
						else if(response == 1){	
								window.location = "user.php";
						}					
						else{
							alert("Λάθος όνομα χρήστη και κωδικός πρόσβασης");
						}
					}
				});
			}
			else{
				alert("Παρακαλώ συμπληρώστε ένα email και κωδικό πρόσβασης");
			}
		});
	});
</script>






<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Εντοπισμός Τοποθεσίας</a>
    </div>
    
	<div class="collapse navbar-collapse" id="myNavbar" style="display:inline-block;">
	
	<form class='navbar-form navbar-right' action="register.php" method = 'post'>
					<input type='submit' name='register' class="btn btn-default" value='Εγγραφή' id='register' style="margin-left: -25px;">
				</form>
	
	
				<form class='navbar-form navbar-right' method = 'post'>
					<div class='form-group' >
						<label style = "color:white;margin:2px 10px">LOGIN </label>
						<input type='text' class='form-control' placeholder='email' name = 'em' id = 'em'>
						<input type='password' class='form-control' placeholder='Κωδικός Πρόσβασης' name = 'pwd' id = 'pwd'>
					</div>
						<input type='button' name='submit' class="btn btn-default" value='Σύνδεση' id='submit'>
				</form>
	 
	
				
				
</div>
 
  
  </div>
</nav>
  

</body>
</html>
