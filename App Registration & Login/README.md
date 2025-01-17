The App Registration & Login directory icludes the code files that were used to make it possible for the admin and users, to create their credentials and login to the app.

register.php: Contains the registration form for all users. At this stage, the user must fill in the necessary fields for Username, email and password, taking into consideration all the registration rules. Once successfully connected, the database is updated with his credentials and then redirected to the index.php home page.

register_server.php: This is where the check for the user's attempt to register takes place and the server's response is passed to register.php

login.php: Contains connect.php. It checks if the name and password entered by each user of the application exists in the database.
It also includes its type, i.e. if it is 1 or 2 it will be a user or an administrator respectively. 
 
logout.php: Logs out the administrator or user from the application and returns him to index.php, i.e. the home page.
