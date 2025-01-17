<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="user.php">HeatMap Location History (2019-2020) <font size="2"> (User)</font></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
		<form class='navbar-form navbar-right' method = 'post' action = "logout.php">
			<div class='form-group' >
				<label id = "synd" style = "color:white">You are signed in as &nbsp;&nbsp;<font color="lightseagreen"><?php echo $_SESSION["first"]." ".$_SESSION["last"]; ?></font> &nbsp;&nbsp;&nbsp;</label>
			
			<ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" onclick="scroll('user_map_elements');" href="user.php#user_map_elements">Display Data</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="scroll('user_display_elements');" href="user.php#user_display_elements">Display Elements Στοιχείων</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
            </ul>
			
			
			</div>
			<input type='submit' class="btn btn-default" name='logout' value='Αποσύνδεση' id='logout'>
		</form>
  </div>
  </div>
</nav>
