The Home Page directory includes the code files that were used to create the appearance of the app.
It consists of the introduction of the application's main content before any user or the admin creates his credentials and attempts to sign-in.

header.php: The page header, which is used in index.php, admin.php , user.php and register.php 

menu.php: Contains the form for the menu for all regular users, which is used in index.php. It also contains a javascript event, which is connected to login.php and in which a check is made to see if a correct connection has been made with an email and password and a check to see if the input type is 1 or 2 (so that the page is displayed as admin or user)
 
index.php: Contains html that loads the home page of the application, which is available to all ordinary users, regardless of whether they are logged in or registered

footer.php: The footer of the page, which is used in index.php, admin.php and user.php
