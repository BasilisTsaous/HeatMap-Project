$(document).ready(function () {
  let mymap = L.map("mapid");
  let osmUrl = "https://tile.openstreetmap.org/{z}/{x}/{y}.png";
  let osmAttrib =
    'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
  let osm = new L.TileLayer(osmUrl, { attribution: osmAttrib });
  mymap.addLayer(osm);
  mymap.setView([38.246242, 21.7350847], 16);

  $("#su_btn").click(function () {
    console.log("File choose");
    var input = document.getElementById("file");
    var f = input.files[0];
    var data = new FormData();
    data.append("file", f);
    $.ajax({
      type: "POST",
      url: "json_to_sql.php",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function (responseData) {
        console.log(responseData);
      },
    });
  });
});

function admintables() {
  //var ld = document.getElementById("load").value;

  const request = $.ajax({
    url: "admin_map_display.php",
    type: "POST",
    data: {},
    success: function (responseText) {
      var reply = JSON.parse(responseText);
      createTable1(reply.t1);
      createTable2(reply.t2);
      createTable3(reply.t3);
      createTable4(reply.t4);
      createTable5(reply.t5);
      createTable6(reply.t6);
    },
  });
}

function createTable1(data) {
  document.getElementById("table-container1").innerHTML = "";
  $('<table class = "table table-bordered" id = "table_1"></table>').appendTo(
    $("#table-container1")
  );
  var table = document.getElementById("table_1");
  var thead = table.createTHead();
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("Distribution of user activities");
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

  for (var element of data) {
    var row = table.insertRow();
    for (key in element) {
      var cell = row.insertCell();
      var text = document.createTextNode(element[key]);
      cell.appendChild(text);
    }
  }
}

function createTable2(data) {
  document.getElementById("table-container2").innerHTML = "";
  $('<table class = "table table-bordered" id = "table_2"></table>').appendTo(
    $("#table-container2")
  );
  var table = document.getElementById("table_2");
  var thead = table.createTHead();
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode(
    "Distribution of the number of records per user"
  );
  th.appendChild(text);
  row.appendChild(th);
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("User");
  th.appendChild(text);
  row.appendChild(th);
  var th = document.createElement("th");
  var text = document.createTextNode("Percentage");
  th.appendChild(text);
  row.appendChild(th);

  for (var element of data) {
    var row = table.insertRow();
    for (key in element) {
      var cell = row.insertCell();
      var text = document.createTextNode(element[key]);
      cell.appendChild(text);
    }
  }
}

function createTable3(data) {
  document.getElementById("table-container3").innerHTML = "";
  $('<table class = "table table-bordered" id = "table_3"></table>').appendTo(
    $("#table-container3")
  );
  var table = document.getElementById("table_3");
  var thead = table.createTHead();
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("Distribution of the number of records per month");
  th.appendChild(text);
  row.appendChild(th);
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("Month");
  th.appendChild(text);
  row.appendChild(th);
  var th = document.createElement("th");
  var text = document.createTextNode("Percentage");
  th.appendChild(text);
  row.appendChild(th);

  for (var element of data) {
    var row = table.insertRow();
    for (key in element) {
      var cell = row.insertCell();
      var text = document.createTextNode(element[key]);
      cell.appendChild(text);
    }
  }
}

function createTable4(data) {
  document.getElementById("table-container4").innerHTML = "";
  $('<table class = "table table-bordered" id = "table_4"></table>').appendTo(
    $("#table-container4")
  );
  var table = document.getElementById("table_4");
  var thead = table.createTHead();
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode(
    "Distribution of the number of records by day of the week"
  );
  th.appendChild(text);
  row.appendChild(th);
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("Day");
  th.appendChild(text);
  row.appendChild(th);
  var th = document.createElement("th");
  var text = document.createTextNode("Percentage");
  th.appendChild(text);
  row.appendChild(th);

  for (var element of data) {
    var row = table.insertRow();
    for (key in element) {
      var cell = row.insertCell();
      var text = document.createTextNode(element[key]);
      cell.appendChild(text);
    }
  }
}

function createTable5(data) {
  document.getElementById("table-container5").innerHTML = "";
  $('<table class = "table table-bordered" id = "table_5"></table>').appendTo(
    $("#table-container5")
  );
  var table = document.getElementById("table_5");
  var thead = table.createTHead();
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("Distribution of the number of records per hour");
  th.appendChild(text);
  row.appendChild(th);
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("Hour");
  th.appendChild(text);
  row.appendChild(th);
  var th = document.createElement("th");
  var text = document.createTextNode("Percentage");
  th.appendChild(text);
  row.appendChild(th);

  for (var element of data) {
    var row = table.insertRow();
    for (key in element) {
      var cell = row.insertCell();
      var text = document.createTextNode(element[key]);
      cell.appendChild(text);
    }
  }
}

function createTable6(data) {
  document.getElementById("table-container6").innerHTML = "";
  $('<table class = "table table-bordered" id = "table_6"></table>').appendTo(
    $("#table-container6")
  );
  var table = document.getElementById("table_6");
  var thead = table.createTHead();
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("Distribution of the number of records per year");
  th.appendChild(text);
  row.appendChild(th);
  var row = thead.insertRow();
  var th = document.createElement("th");
  var text = document.createTextNode("Year");
  th.appendChild(text);
  row.appendChild(th);
  var th = document.createElement("th");
  var text = document.createTextNode("Percentage");
  th.appendChild(text);
  row.appendChild(th);

  for (var element of data) {
    var row = table.insertRow();
    for (key in element) {
      var cell = row.insertCell();
      var text = document.createTextNode(element[key]);
      cell.appendChild(text);
    }
  }
}

function admindata() {
  var year_1 = document.getElementById("year_1").value;
  var year_2 = document.getElementById("year_2").value;
  var month_1 = document.getElementById("month_1").value;
  var month_2 = document.getElementById("month_2").value;
  var day_1 = document.getElementById("day_1").value;
  var day_2 = document.getElementById("day_2").value;
  var hour_1 = document.getElementById("hour_1").value;
  var hour_2 = document.getElementById("hour_2").value;
  var act = document.getElementById("act").value;
  //var sub = document.getElementById("submit").value;
  const request = $.ajax({
    url: "admin_data.php",
    type: "POST",
    data: {
      year_1: year_1,
      year_2: year_2,
      month_1: month_1,
      month_2: month_2,
      day_1: day_1,
      day_2: day_2,
      hour_1: hour_1,
      hour_2: hour_2,
      act: act /*sub:sub*/,
    },
    success: function (responseText) {
      heatmap(responseText);
    },
  });
}

function exportdata() {
  var year_1 = document.getElementById("year_1").value;
  var year_2 = document.getElementById("year_2").value;
  var month_1 = document.getElementById("month_1").value;
  var month_2 = document.getElementById("month_2").value;
  var day_1 = document.getElementById("day_1").value;
  var day_2 = document.getElementById("day_2").value;
  var hour_1 = document.getElementById("hour_1").value;
  var hour_2 = document.getElementById("hour_2").value;
  var act = document.getElementById("act").value;
  //var exp = document.getElementById("export").value;
  const request = $.ajax({
    url: "export_data.php",
    type: "POST",
    data: {
      year_1: year_1,
      year_2: year_2,
      month_1: month_1,
      month_2: month_2,
      day_1: day_1,
      day_2: day_2,
      hour_1: hour_1,
      hour_2: hour_2,
      act: act /*exp:exp*/,
    },
    success: function (responseText) {
      exportasfile(responseText);
    },
  });
}

function exportasfile(responseText) {
  if (responseText == 1) {
    alert("Successful file extraction");
  } else {
    alert("File extraction failed");
  }
}

function deletedata() {
  var d = confirm("Do you want to delete all data?");
  if (d == true) {
    const request = $.ajax({
      url: "delete_data.php",
      type: "POST",
      success: function (response) {
        console.log(response);
        if (response == 111) {
          alert("Data deleted successfully");
          window.location = "admin.php";
        } else {
          alert("Try again");
        }
      },
    });
  }
}

function heatmap(responseText) {
  var data = JSON.parse(responseText);
  $("#contain").empty();
  $("#contain").append(
    '<div id="mapid" style="width: 1520px; height: 400px; position:relative;"></div>'
  );
  let mymap = L.map("mapid");
  let osmUrl = "https://tile.openstreetmap.org/{z}/{x}/{y}.png";
  let osmAttrib =
    'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
  let osm = new L.TileLayer(osmUrl, { attribution: osmAttrib });
  mymap.addLayer(osm);
  mymap.setView([38.246242, 21.7350847], 16);
  let testData = {
    max: 8,
    data: data,
  };

  let cfg = {
    radius: 40,
    maxOpacity: 0.8,
    scaleRadius: false,
    useLocalExtrema: false,
    latField: "lat",
    lngField: "lng",
    valueField: "count",
  };

  let heatmapLayer = new HeatmapOverlay(cfg);

  mymap.addLayer(heatmapLayer);
  heatmapLayer.setData(testData);
}
