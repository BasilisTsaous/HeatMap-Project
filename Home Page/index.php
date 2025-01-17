<!DOCTYPE html>
<html>
 <?php
include("header.php"); 
include("menu.php");
?>
 <head>
 
 
  <?php 
		session_start();
		if ( isset($_SESSION['first']) && isset($_SESSION['last']) ) {
			if($_SESSION['type']==2){
				header("Location:admin.php");
			}
			if($_SESSION['type']==1){
				header("Location:user.php");
			}
		}
	?>
   
	
<title>Quick Start - Leaflet</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	

	
	
	
</head>

<body cz-shortcut-listen="true">



<div id="mapid" style="width: 1520px; height: 400px; position:relative;" class="leaflet-container leaflet-fade-anim leaflet-grab leaflet-touch-drag" tabindex="0"><div class="leaflet-pane leaflet-map-pane" style="transform: translate3d(0px, 0px, 0px);"><div class="leaflet-pane leaflet-tile-pane"><div class="leaflet-layer " style="z-index: 1; opacity: 1;"><div class="leaflet-tile-container leaflet-zoom-animated" style="z-index: 18; transform: translate3d(0px, 0px, 0px) scale(1);"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/13/4093/2723?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(56px, -91px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/13/4094/2723?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(312px, -91px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/13/4093/2724?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(56px, 165px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/13/4094/2724?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(312px, 165px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/13/4092/2723?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-200px, -91px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/13/4095/2723?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(568px, -91px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/13/4092/2724?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(-200px, 165px, 0px); opacity: 1;"><img alt="" role="presentation" src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/13/4095/2724?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw" class="leaflet-tile leaflet-tile-loaded" style="width: 256px; height: 256px; transform: translate3d(568px, 165px, 0px); opacity: 1;"></div></div></div><div class="leaflet-pane leaflet-shadow-pane"></div><div class="leaflet-pane leaflet-overlay-pane"></div><div class="leaflet-pane leaflet-marker-pane"></div><div class="leaflet-pane leaflet-tooltip-pane"></div><div class="leaflet-pane leaflet-popup-pane"></div><div class="leaflet-proxy leaflet-zoom-animated" style="transform: translate3d(1.04805e+06px, 697379px, 0px) scale(4096);"></div></div><div class="leaflet-control-container"><div class="leaflet-top leaflet-left"><div class="leaflet-control-zoom leaflet-bar leaflet-control"><a class="leaflet-control-zoom-in" href="#" title="Zoom in" role="button" aria-label="Zoom in">+</a><a class="leaflet-control-zoom-out" href="#" title="Zoom out" role="button" aria-label="Zoom out">−</a></div></div><div class="leaflet-top leaflet-right"></div><div class="leaflet-bottom leaflet-left"></div><div class="leaflet-bottom leaflet-right"><div class="leaflet-control-attribution leaflet-control"><a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> | Map data © <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a></div></div></div></div>
<script>

	var mymap = L.map('mapid').setView([38.2462420, 21.7350847], 16);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	}).addTo(mymap);

</script>

 
<br><br><br><br>
<body>
<!--About Us-->
<div id="informations" style="background-color:#eee;">
  <div class="row" >
      <div class="container" style="text-align:left">
          <img src="images/info-image.jpg" style="width:600px; height:400px; margin-left:-130px; margin-top:-40px;">   
      </div>
	  
	  <div class="container" style="text-align:right; margin-top:-430px; margin-right:380px;">
	    <h1> About Us </h1>
	  </div>
		
		<div class="container" style="text-align:center; margin-right:-120px;"> 
		     <p> 
			     	 The Google Maps service is used on the mobile phones of millions of users to offer navigation and spatial information<br> 
			         search services. The settings of the Google account that users maintain on their mobiles allow the activation of the<br> 
			         Location History service, according to which Google saves the user's current location in the cloud, with the aim of<br> 
			         allowing the user to see, among other things, the history of his movements.<br>
			         <br>
				 The data offered by this service have a special value both for the user himself and for the society in general.<br> 
			         With this application, each user will be able to voluntarily contribute their data to a common "smart city" repository<br> 
			         and receive an analysis describing how environmentally friendly their commutes are.<br>
				 <br>
				 The administrator can analyze the population level the routes that the users choose to take, so that the urban<br> 
			         infrastructure can be better designed, but also the areas where the population is concentrated in the city of Patras,<br> 
			         so that in case of emergencies, the planning of the dispatch of ambulances and fire brigades can be more efficient.<br>
		     </p> 
			 
		 </div>
	 </div>
</div>
  
<br><br><br><br><br>

 <!-- Contact -->
 <div id="contact">
  
    <section class="container tm-contact-section">

      <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-12 tm-contact-left">
          <div class="tm-contact-form-container ml-auto mr-0">
            <header>
              <h2 class="tm-contact-header">Contact Us</h2>
            </header>
            <form action="index.php" class="tm-contact-form" method="POST">
             
			  <div class="form-group">
			  
                <input
                  type="text"
                  id="contact_name"
                  name="contact_name"
                  class="form-control"
                  placeholder="Name"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="email"
                  id="contact_email"
                  name="contact_email"
                  class="form-control"
                  placeholder="Email"
                  required
                />
              </div>
              <div class="form-group">
                <textarea
                  rows="5"
                  id="contact_message"
                  name="contact_message"
                  class="form-control"
                  placeholder="Message"
                  required
                ></textarea>
              </div>
              <div class="tm-text-right">
                <button onclick="send_mail();" type="submit" class="btn tm-btn tm-btn-big">
				Send It
                </button>
              </div>
            </form>
			
		
			
          </div>
        </div>
        <div class="col-xl-7 col-lg-6 col-md-12 tm-contact-right">
          <div class="tm-contact-figure-block">
            <figure class="d-inline-block">
              <img src="images/contact-image.jpeg" style="width:600px; height:400px; margin-top:-40px;">
              
            </figure>
          </div>
        </div>
      </div>
    </section>
</div>

<br><br>

<?php
    function send_mail(){
		$to = "tsaous@gmail.com ;
		$sender= $_POST['contact_name'];
		$email= $_POST['contact_email'];
		$text = $_POST['contact_message'];
		$subject='';
		$headers='';
		$parameters='';
	    mail($to,$subject,$text,$headers,$parameters);
	}
?> 



<?php
include("footer.php");
?>


</body>
</html>
