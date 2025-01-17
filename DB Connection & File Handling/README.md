The DB Connection & File Handling directory includes the code files that were used to establish and check the connection with a Database.
There are also the basic functions that were created to use the files downloaded from Google repositories and process the data exported from them(ie. upload,delete the locations data).

connect.php: A connection is made to the database and the timezone is set as Athens default
 
json_to_sql.php: Transferring the data from the 5 files, which were downloaded from a repository with location data from Google Aaccounts, to our database, after first converting each file into a readable format for the database
 
Location History Files: (respectively for 1,2,3,4,5) A folder containing 5 files with collected data that will be managed by the admin

export_data.php: Exports the selected data to a json file
 
upload.php: The downloaded json files are uploaded to the database

locations.sql: The export of the database

delete_data.php: Delete all database data

Data.json : A test file containing data, which are the result of some selected actions from the page, to test the app's functionality
