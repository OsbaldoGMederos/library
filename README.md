# Library

## Set up (Windows)

* Install [XAMPP](https://www.apachefriends.org/es/index.html)
* Install [Composer](https://getcomposer.org/download/)
* You will need npm (Node Package Manager) to install some node_modules.
So install [Nodejs](https://nodejs.org/es/) default installation includes npm).
* Clone this repo in your htdocs (Example: C:\xamp\htdocs\).
* **cd** to the library folder
* Run **composer install**.
* Run **npm install**.
* Run **npm run dev** to compile assets
* Copy the content of **.env.example** to a new file called **.env**
* Run **php artisan key:generate**
* Create a new database using phpMyAdmin and call it **library**.
* Edit the **.env** file to match your Database configuration such a`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.
* Run **php artisan migrate**
* Edit the file C:\xampp\apache\conf\extra\httpd-vhosts.conf and add the next tags at the end (Change the directory path to your own).
```HTML
<VirtualHost *:80>
    ServerAdmin mylibrary.dev
    DocumentRoot "C:/xampp/htdocs/library/public"
</VirtualHost> 

<VirtualHost *:80>
    ServerAdmin localhost
    DocumentRoot "C:/xampp/htdocs/"
</VirtualHost>
```
* Edit C:\Windows\System32\drivers\etc\hosts *as administrator* and add the next lines at the end
```html
127.0.0.1 localhost
127.0.0.1 mylibrary.dev
```
* restart your apache server on XAMPP control.
* Now go to http://mylibrary.dev on your web browser.

### Notes
* Sometimes Chrome forces https connection. If so, your not going to be able to open the app, so try to use a different browser insted (like firefox). Or [create a Self Certificate and enable SSL](https://stackoverflow.com/questions/42951159/why-the-connection-appear-to-be-not-secure-on-my-php-webapp-depolyed-on-my-loc)
* You can run **php artisan serve** as well to see the web app on `http://localhost:8000`.


## Set up (Linux)
* Set a LAMP environment in your system. You can search for docs of how to do it in your own distro.
* Create a `/etc/apache2/sites-available/library.conf` file.
* Have Apache2 service and MySql or MariaDB service running.
* Install [Composer](https://getcomposer.org/download/)
* You will need npm (Node Package Manager) to install some node_modules.
So install [Nodejs](https://nodejs.org/es/) (default installation includes npm).
* **cd** to the library folder
* Run **composer install**.
* Run **npm install**.
* Copy the content of **.env.example** to a new file called **.env**
* Run **php artisan key:generate**
* Run **npm run dev** to compile assets.
* Create a new database called **library**.
* Edit the **.env** file to match your Database configuration such a`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.
* Run **php artisan migrate**
* Edit the `/etc/apache2/apache2.conf` file.
Add a Directory field like:
```html
<Directory /path/to/the/repository>
	Options Indexes FollowSymLinks
	AllowOverride All
	Require all granted
</Directory>
```
* Create a config file to the `/etc/apache2/sites-available/` directory.
Call it **library.conf** and add your configuration like:
```html
<VirtualHost *:80>.
    ServerName library.dev
    ServerAdmin webmaster@localhost
    # Your Custom folder 
    DocumentRoot /path/to/the/repository/public
    <Directory /path/to/the/repository/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log common
</VirtualHost>
```
* Change your apache2 site with **sudo a2dissite 000-default.conf**
* Enable the new configuration with **sudo a2ensite library.conf**
* Reload your service with **sudo service apache reload** or an equivalent for your distro.
* Now you can go to your browser on http://localhost or you can run **php artisan serve** on the repository directory to serve the web app on localhost:8000

### Notes
* Sometimes Chrome forces https connection. If so, your not going to be able to open the app, so try to use a different browser insted (like firefox). Or [create a Self Certificate and enable SSL](https://stackoverflow.com/questions/42951159/why-the-connection-appear-to-be-not-secure-on-my-php-webapp-depolyed-on-my-loc)
* You can run **php artisan serve** as well to see the web app on `http://localhost:8000`.
* There is a file called **migrate.sql** with the queries to create the database if you prefer instead of using migration.
* There is a file called **populateDB.sql** with queries to add categories and books to start with.
