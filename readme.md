**********************************************************************************
*********************Steps for getting started ***********************************
**********************************************************************************

After you get the LaravelAuth folder in your location, follow these steps :

-Move the folder to some location, for instance D:/laravel-auth

-Now with your Favorite Text Editor, if you are using sublime text, which is my favorite, drag the folder to sublime text.

-Now open database.php under config folder, under app folder.

-Now by default laravel chooses mysql as your database, after opening database.php change the database settings in the mysql section. Give the database and the username and passoword.

-Now open Mail.php under config folder.

-Set the credentials accordingly in that, so the application become able to send the mail.

-Now as you have the database and mail option set, open cmd.

-Navigate yourself to D:/laravel-auth (whichever path you have choosen).

-Now run the command "php artisan migrate"

-The above command will create the table users and migrations in the database that you set in the database.php. You can cross check it in the phpmyadmin or sqlconsole or whatever you are using.

-Perfect. You are set to go.

-Run "php artisan serve" to start the application.

-By default, it starts on 8000 port. If you want it to run on another port, run the following command "php artisan serve --port=8080" or whatever the port number you want.

-Done.

