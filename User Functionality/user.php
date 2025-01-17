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
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="user.js"></script>
		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
        <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>

  </head>
<body>
 
<?php
 include("header.php");
 include("menu_user.php");
?>


<div id = "contain"><div id="mapid" style="width: 1520px; height: 400px; position:relative;"></div></div>


<div class = "container">
	<div class = "row">
		<div class = "col-sm-6">
		    <form class = "form-horizontal" enctype="multipart/form-data">
				<h2>Upload File</h2>
					<div class="form-group">
					<label class="control-label col-sm-2">Choose file:</label>
					    <div class="col-sm-10">
							<input type="file" class="form-control" id="file" name="file" accept=".json">
						</div>
					</div>
						<div class= "form-group">
							<div class = "col-sm-offset-2 col-sm-10">
								<button type = "button" id = "su_btn" name = "su_btn" class="btn btn-primary">Submit</button>
							</div>
						</div>
			</form>
		</div>
	</div>
</div>



<div id="user_map_elements" class=col-md-12 style='margin-top:30px; text-align:center; position:relative;'>

<div class = "container-fluid" >
	<div class="row element">
	    <!--<div id = "table-container1" class = "col">
			<table class = "table table-bordered" id = "prev_year"></table>
		</div>
		<div class = "col-3">
			<label id = "current_month_score"></label>
		</div>
		<div class = "col-3">
			<label id = "info_eggrafis"></label>
		</div>
		<div class = "col-3">
			<label id = "last_uploaded"></label>
		</div> -->
		
	<!--	<div id = "table-container2" class = "col">
			<table class = "table table-bordered" id = "type"></table>
		</div>  -->
		<div id = "table-container3" class = "col">
			<table class = "table table-bordered" id = "day"></table>
		</div>
		<div id = "table-container4" class = "col">
			<table class = "table table-bordered" id = "hour"></table>
		</div>
	</div>
</div>





 <form>    
  
  <table class="table table-bordered" style="width:60%; margin-left:300px;">
    <thead>
      <tr>
        <th> <h4><b> DATA ANALYSIS </h4> </th>
        <th><b>FROM</th>
        <th><b>TO</th>
      </tr>
    </thead>
	
    <tbody>
      <tr>
        <td><b>YEAR</td>
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
        <td><b>MONTH</td>
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
    </table>
	
  <div class= "form-group">
    <button type="button" class="btn btn-primary" id = "submit" name="sub" onclick="userdata()">SUBMIT</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" class="btn btn-primary" id="load2" name="ld2" onclick="usertables()">LOAD BOARDS</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" class="btn btn-primary" id="load3" name="ld3" onclick="userinfo()">SHOW INFO</button>
  </div>

</form>



</div>


</body>
<?php
include("footer.php");
?>
</html>
