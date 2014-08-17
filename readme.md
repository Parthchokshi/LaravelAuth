## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


**********************************************************************************
*********************Steps for getting started ***********************************
**********************************************************************************

After you get the laravel-auth folder in your location, follow these steps :

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

