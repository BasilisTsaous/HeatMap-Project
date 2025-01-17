The Admin Functionality directory contains the code files that provide the admin with every available task.
The administrator can gain the unique access to each user's Location Data History and analyze them acccordingly based on the Hour,Day,Month,Year and Activities, in order to use and understand in a better way, the HeatMap data results.

menu_admin.php: Contains the form for the admin menu which is used in admin.php. It also contains in its navigation bar, the two main functions of the administrator, "Admin Map Display" and "DataBase Display".

admin.php: Contains html that loads the admin form, including all its functions. In the navigation bar of the page, by selecting appropriately, you can go to the corresponding function in another part of the page. 
 
admin.js: Contains javascript events for the admin form. It also provides the HeatMmap algorithm, the data export and data deletion functionalities.

admin_data.php: It contains the data selection from the database for the fields Latitude(lat), Longitude(longt) and Count and based on the options for Year, Month, Day, Hour, Activity from the admin form, the coordinates of the map are returned.

admin_map_display.php: It contains the data selection from the database, each time collecting data from different fields and tables, in order to create each of the 5 distributions that will be displayed for the administrator.   
