<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php">HeatMap Location History (2019-2020) <font size="2"> (Διαχειριστής)</font></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
		<form class='navbar-form navbar-right' method = 'post' action = "logout.php">
			<div class='form-group' >
				<label id = "synd" style = "color:white">Έχετε συνδεθεί ως &nbsp;&nbsp;<font color="lightseagreen"><?php echo $_SESSION["first"]." ".$_SESSION["last"]; ?></font> &nbsp;&nbsp;&nbsp;</label>
			
			<ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" onclick="scroll('map_elements');" href="admin.php#map_elements">Απεικόνιση Στοιχείων Χάρτη</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
                <li class="nav-item">
                  <a class="nav-link" onclick="scroll('dashboard');" href="admin.php#dashboard">Απεικόνιση ΒΔ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </li>
            </ul>
			
			</div>
			<input type='submit' class="btn btn-default" name='logout' value='Αποσύνδεση' id='logout'>
		</form>
  </div>
  </div>
</nav>
