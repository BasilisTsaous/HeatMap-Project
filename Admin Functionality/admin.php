<!DOCTYPE html>
<html>
	<?php 
		session_start();
		if ( !isset( $_SESSION['first'] ) && !isset( $_SESSION['last'] ) ) {
			header("Location:index.php");
		}
	?>
  <head>
  
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		<script src="admin.js"></script>
		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
        <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			
  </head>
<body>

<?php
  include("header.php");
  include("menu_admin.php"); 
?>







<div id = "contain"><div id="mapid" style="width: 1520px; height: 400px; position:relative;"></div></div>

 <div id="dashboard" > 
  <div class= "container-fluid">
	<hr>
		<div class="row element">
			<div id = "table-container1"  class = "col">
				<table class = "table table-bordered" id = "table_1"></table>
			</div>
			<div id = "table-container2" class = "col">
				<table class = "table table-bordered" id = "table_2"></table>
			</div>
			<div id = "table-container3"  class = "col">
				<table class = "table table-bordered" id = "table_3"></table>
			</div>
		</div>
		<div class="row element">
			<div id = "table-container4"  class = "col">
				<table class = "table table-bordered" id = "table_4"></table>
			</div>
			<div id = "table-container5" class = "col">
				<table class = "table table-bordered" id = "table_5"></table>
			</div>
			<div id = "table-container6"  class = "col">
				<table class = "table table-bordered" id = "table_6"></table>
			</div>
		</div>
	</div>
 </div>

	<div id="map_elements" class=col-md-12 style='margin-top:30px; text-align:center; position:relative;'>
	 <form>  
	 
	  
	  <table class="table table-bordered" style="width:60%; margin-left:300px;">
		<thead>
		  <tr>
			<th> <h4><b> ΑΠΕΙΚΟΝΙΣΗ ΣΤΟΙΧΕΙΩΝ </h4> </th>
			<th><b>ΑΠΟ</th>
			<th><b>ΕΩΣ</th>
		  </tr>
		</thead>
		
		<tbody>
		  <tr>
			<td><b>ΕΤΟΣ</td>
			<td> &nbsp; <select id="year_1" name=year_1> 
				<?php
				  for ($y=2013;$y<=2019;$y++)
					{ echo "<option value=$y>$y</option>"; }
				?>
			  </select> </td>
			  
			<td> &nbsp; <select id="year_2" name=year_2> 
				<?php
				  for ($y=2013;$y<=2019;$y++)
					{ echo "<option value=$y>$y</option>"; }
				?>
			 </select> </td>
		  </tr>
		  
		  <tr>
			<td><b>ΜΗΝΑΣ</td>
			<td>&nbsp; <select id="month_1" name=month_1>
				<?php
				$currentmonth =date('m');  
				echo" <option value=$currentmonth>".$currentmonth."</option>";
					for ($m=1;$m<=9;$m++)
					{ echo "<option value=$m>0$m</option>"; }
					for ($m=10;$m<=12;$m++)
					{ echo "<option value=$m>$m</option>"; }
				?> </td>
				 
			<td> &nbsp; <select id="month_2" name=month_2>
				<?php  
				   $currentmonth =date('m');  
				   echo" <option value=$currentmonth>".$currentmonth."</option>";
				   for ($m=1;$m<=9;$m++)
					{ echo "<option value=$m>0$m</option>"; }
					for ($m=10;$m<=12;$m++)
					{ echo "<option value=$m>$m</option>"; }
				?></td>
		  </tr>
		  
		  <tr>
			<td><b>ΗΜΕΡΑ</td>
			<td> &nbsp;<select id="day_1" name=day_1>  
			 <?php
				$currentday =date('d');  
			 echo" <option value=$currentday>".$currentday."</option>";
				  for ($d=1;$d<=9;$d++)
					{ echo "<option value=$d>0$d</option>"; }
				  for ($d=10;$d<=31;$d++)
					{ echo "<option value=$d>$d</option>"; }
			
			 ?></td>
			 
			<td> <select id="day_2" name=day_2>
			 <?php
				$currentday =date('d');  
			 echo" <option value=$currentday>".$currentday."</option>";  
				  for ($d=1;$d<=9;$d++)
					{ echo "<option value=$d>0$d</option>"; }
				  for ($d=10;$d<=31;$d++)
					{ echo "<option value=$d>$d</option>"; }
			
			?></td>
		  </tr>
		  
		  <tr>
			<td><b>ΩΡΑ</td>
			<td> &nbsp; <select id="hour_1" name=hour_1>
			<?php
			 $currenthour =date('H');  
			 echo" <option value=$currenthour>".$currenthour.":00</option>";  
			 for ($h=0;$h<24;$h++)					 
			  { echo "<option value=$h>$h:00</option>"; }
			?>
			</select></td>
			
			<td> &nbsp; <select id="hour_2" name=hour_2>
			<?php				    
			 $currenthour =date('H'); 
			 echo" <option value=$currenthour>".$currenthour.":00</option>";  
				for ($h=0;$h<24;$h++)
				{ echo "<option value=$h>$h:00</option>"; }
			?>
		   </select></td>
		  </tr>
		  
		   <tr rowspan="2">
			<td>
			<b>ΔΡΑΣΤΗΡΙΟΤΗΤΑ</b>
			<p><h8> Διαλέξτε τρόπο(ή τρόπους) μετακίνησης:</h8></p>
			</td>
			<td colspan="2"> <select id="act" name=act>
			<?php					 
		    echo"
				<option value=\"EXITING_VEHICLE\">EXITING_VEHICLE</option>
				<option value=\"IN_BUS\">IN_BUS</option>
				<option value=\"IN_CAR\">IN_CAR</option>
				<option value=\"IN_RAIL_VEHICLE\">IN_RAIL_VEHICLE</option>
				<option value=\"IN_FOUR_WHEELER_VEHICLE\">IN_FOUR_WHEELER_VEHICLE</option>
				<option value=\"IN_ROAD_VEHICLE\">IN_ROAD_VEHICLE</option>
				<option value=\"IN_TWO_WHEELER_VEHICLE\">IN_TWO_WHEELER_VEHICLE</option>
				<option value=\"ON_BICYCLE\">ON_BICYCLE</option>
				<option value=\"ON_FOOT\">ON_FOOT</option>
				<option value=\"RUNNING\">RUNNING</option>
				<option value=\"STILL\">STILL</option>
				<option value=\"TILTING\">TILTING</option>
				<option value=\"UNKNOWN\">UNKNOWN</option>  
				<option value=\"WALKING\">WALKING</option>"
			?>	   
			</select></td>
		  </tr>
		</tbody>
	  </table>
	  <div class= "form-group">         
		<button type="button" class="btn btn-primary" id = "submit" name="sub" onclick="admindata()">SUBMIT</button> &nbsp;&nbsp;&nbsp;
		<button type="button" class="btn btn-primary" id = "delete" name="del" onclick="deletedata()">DELETE</button> &nbsp;&nbsp;&nbsp;
		<button type="button" class="btn btn-primary" id = "export" name="exp" onclick="exportdata()">EXPORT</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="button" class="btn btn-primary" id = "load"   name="ld"  onclick="admintables()">LOAD BOARDS</button>
	  </div>
	  <br><br><br><br> 
	  
 </form>
</div>


</body>
<?php  
include("footer.php");
?>
</html>