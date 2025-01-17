$(document).ready(function(){
	
		let mymap = L.map("mapid");
		let osmUrl = "https://tile.openstreetmap.org/{z}/{x}/{y}.png";
		let osmAttrib =
		  'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
		let osm = new L.TileLayer(osmUrl, { attribution: osmAttrib });
		mymap.addLayer(osm);
		mymap.setView([38.2462420, 21.7350847],16);
	
	$('#su_btn').click(function(){
		console.log("File choose");
		var input = document.getElementById("file");
		var f = input.files[0];
		var data = new FormData();
		data.append('file', f);
		$.ajax({
			type: 'POST',
			url: "json_to_sql.php",
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			success: function(responseData){
				console.log(responseData);
			}
		});
	});
});	

	function userdata(){
			var year_1 = document.getElementById("year_1").value;
			var year_2 = document.getElementById("year_2").value;
			var month_1 = document.getElementById("month_1").value;
			var month_2 = document.getElementById("month_2").value;
			var sub = document.getElementById("submit").value;
		const request = 
		$.ajax({
			url: "user_data.php",
			type: "POST",
			data: {year_1: year_1, year_2: year_2, month_1:month_1, month_2:month_2, sub:sub},
			success: function(responseText){
				heatmap(responseText);
			}
		});
	}
	
	
	
	function usertables(){
		
		var year_1 = document.getElementById("year_1").value;
		var year_2 = document.getElementById("year_2").value;
		var month_1 = document.getElementById("month_1").value;
		var month_2 = document.getElementById("month_2").value;
		var ld2 = document.getElementById("load2").value;
			
		
		
	const request = 
		$.ajax({
			url: "user_map_analysis.php",
			type: "POST",
			data: {year_1: year_1, year_2: year_2, month_1:month_1, month_2:month_2},
			success: function(responseText2){	
		           var reply = JSON.parse(responseText2);
				        //createTableType(reply.pososto);
						createTableDay(reply.day);
						createTableHour(reply.hour);
            }
		});
	}
		
		
	/*function createTableType(data) {
		document.getElementById("table-container2").innerHTML="";
				$('<table class = "table table-bordered" id = "type"></table>').appendTo($("#table-container2"));
				var table = document.getElementById("type");
				var thead = table.createTHead();
				var row = thead.insertRow();
				var th = document.createElement("th");
				var text = document.createTextNode("Percentage of records by type of activity");
				th.appendChild(text);
				row.appendChild(th);
				var row = thead.insertRow();
				var th = document.createElement("th");
				var text = document.createTextNode("Activity");
				th.appendChild(text);
				row.appendChild(th);
				var th = document.createElement("th");
				var text = document.createTextNode("Percentage");
				th.appendChild(text);
				row.appendChild(th);
				
				for(var element of data){
					var row = table.insertRow();
					for(key in element){
						var cell = row.insertCell();
						var text = document.createTextNode(element[key]);
						cell.appendChild(text);
					}
				}
	} */
	
	
	function createTableDay(data){
				document.getElementById("table-container3").innerHTML="";
				$('<table class = "table table-bordered" id = "day"></table>').appendTo($("#table-container3"));
				var table = document.getElementById("day");
				var thead = table.createTHead();
				var row = thead.insertRow();
				var th = document.createElement("th");
				var text = document.createTextNode("Day of the week with the most records by type of activity");
				th.appendChild(text);
				row.appendChild(th);
				var row = thead.insertRow();
				var th = document.createElement("th");
				var text = document.createTextNode("Day");
				th.appendChild(text);
				row.appendChild(th);
				var th = document.createElement("th");
				var text = document.createTextNode("Activity");
				th.appendChild(text);
				row.appendChild(th);
				var th = document.createElement("th");
				var text = document.createTextNode("Number");
				th.appendChild(text);
				row.appendChild(th);
				
				for(var element of data){
					var row = table.insertRow();
					for(key in element){
						var cell = row.insertCell();
						var text = document.createTextNode(element[key]);
						cell.appendChild(text);
					}
				}
			}
			
			function createTableHour(data){
				document.getElementById("table-container4").innerHTML="";
				$('<table class = "table table-bordered" id = "hour"></table>').appendTo($("#table-container4"));
				var table = document.getElementById("hour");
				var thead = table.createTHead();
				var row = thead.insertRow();
				var th = document.createElement("th");
				var text = document.createTextNode("Time of day with the most records by type of activity");
				th.appendChild(text);
				row.appendChild(th);
				var row = thead.insertRow();
				var th = document.createElement("th");
				var text = document.createTextNode("Ωρα");
				th.appendChild(text);
				row.appendChild(th);
				var th = document.createElement("th");
				var text = document.createTextNode("Activity");
				th.appendChild(text);
				row.appendChild(th);
				var th = document.createElement("th");
				var text = document.createTextNode("Number");
				th.appendChild(text);
				row.appendChild(th);
				
				for(var element of data){
					var row = table.insertRow();
					for(key in element){
						var cell = row.insertCell();
						var text = document.createTextNode(element[key]);
						cell.appendChild(text);
					}
				}
			}
	
	
	function userinfo(){
		//var ld3 = document.getElementById("load3").value;
		
		const request = 
		$.ajax({
			url: "user_map_display.php",
			type: "POST",
			data: {},
			success: function(responseText3){
				var reply = JSON.parse(responseText3);
				createTable(reply.year_echo_score);
				$('#current_month_score').append('Ecological Mobility for the current month: '+reply.month_echo_score+"%");
				$('#info_eggrafis').append('Your records start from '+reply.user_records.start+' to '+reply.user_records.end);
				$('#last_uploaded').append('Your last upload was: '+reply.upload);
			}
		});
		
		
	}
	
	function createTable(data){
				document.getElementById("table-container1").innerHTML="";
				$('<table class = "table table-bordered" id = "prev_year"></table>').appendTo($("#table-container1"));
				var table = document.getElementById("prev_year");
				var thead = table.createTHead();
				var row = thead.insertRow();
				var th = document.createElement("th");
				var text = document.createTextNode("Previous Year Ecological Mobility Score");
				th.appendChild(text);
				row.appendChild(th);
				var row = thead.insertRow();
				var th = document.createElement("th");
				var text = document.createTextNode("Date");
				th.appendChild(text);
				row.appendChild(th);
				var th = document.createElement("th");
				var text = document.createTextNode("Percentage");
				th.appendChild(text);
				row.appendChild(th);
			
				
				for(var element of data){
					var row = table.insertRow();
					for(key in element){
						var cell = row.insertCell();
						var text = document.createTextNode(element[key]);
						cell.appendChild(text);
					}
				}
			}
	
	
	
	function heatmap(responseText){
		var data = JSON.parse(responseText);
		$('#contain').empty();
		$('#contain').append('<div id="mapid" style="width: 1520px; height: 400px; position:relative;"></div>');
		let mymap = L.map("mapid");
		let osmUrl = "https://tile.openstreetmap.org/{z}/{x}/{y}.png";
		let osmAttrib =
		  'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
		let osm = new L.TileLayer(osmUrl, { attribution: osmAttrib });
		mymap.addLayer(osm);
		mymap.setView([38.2462420, 21.7350847],16);
		let testData = {
		  max: 8,
		  data: data
		};
		  
		let cfg = {
		  "radius": 40,
		  "maxOpacity": 0.8,
		  "scaleRadius": false,
		  "useLocalExtrema": false,
		  latField: 'lat',
		  lngField: 'lng',
		  valueField: 'count'
		};

		let heatmapLayer =  new HeatmapOverlay(cfg);

		mymap.addLayer(heatmapLayer);
		heatmapLayer.setData(testData);
	}
