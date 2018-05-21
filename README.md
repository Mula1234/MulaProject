Before setup project please make sure your system has following things installed.

1. PHP, Apache, MySQL
2. Node JS

Setup Instruction

1. Put Mula project inside your apache server root directory (www OR htdocs)
2. Now open http://localhost/phpmyadmin in your browser.
3. Create database named with "mulacoin" inside phpmyadmin.
4. Now export mulacoin.sql ( inside mula project folder ) inside "mulacoin" database.
5. Open command prompt go to ico folder inside mula project directory and run command "node server".

Note: 
Please check username, password and database name in config go to--
PROJECT > application > config.
Open database.php and change following (hostname, username, password) according to your configuration.

Now open http://localhost/mula in your browser.
