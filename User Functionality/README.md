menu_user.php: Contains the form for the user menu which is used in user.php. It also contains in its navigation bar, the two basic functions of the user, "Element Analysis" and "Element Display". 
  
user.php: Contains html that loads the user's form, including all its functions. In the navigation bar of the page, by selecting appropriately, you can go to the corresponding function in another part of the page.
 
user.js: Contains javascript events for the user's form and the functionality of the HeatMap algorithm. 

user_data.php: It contains the data selection from the database for the fields Latitude(lat), Longitude(longt) and Count and based on the options for Year, Month, Day, Hour, Activity from the admin form, the coordinates of the map are returned.

user_map_analysis.php: Provides selections from the database, collecting data from different fields and tables, so that we can create new tables that will show the percentage of registrations per type of activity, 
the time of day and the day of the week with the most registrations per type of activity.

user_map_display.php: Provides selections from the database, collecting data from different fields and tables, in order to create new tables that will show the user's ecological mobility score,
the period covered by his records and the date of his last data upload.

