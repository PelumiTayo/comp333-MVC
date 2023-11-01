# Backend Documentation

[< Back to main README](../README.md)

## Database Structure



## Deploying application

Any of the following servers are required to deploy a PHP application.

- [Apache](https://httpd.apache.org)
- [nginx](https://www.nginx.com)

Or a comprehensive package, [XAMPP](https://www.apachefriends.org), that comes with a MySQL, ProFTPD, Apache servers.

### Configurations

To access the MySQL database, credentials must be changed in [`/src/db.php`](./src/db.php)
```PHP
$DB_HOSTNAME = ;
$DB_USERNAME = ;
$DB_PASSWORD = ;
$DB_DATABASE = ;
$DB_PORT = ;
$DB_SOCKET = ;
```
These values should be set according to the MySQL database in use for deployment.

### Database tables
For `user_table`,
```SQL
CREATE TABLE user_table (username VARCHAR(255), password VARCHAR(255), PRIMARY KEY(username));
```
For `ratings_table`,
```SQL
CREATE TABLE ratings_table (
    id INT NOT NULL AUTO_INCREMENT, 
    username VARCHAR(255), 
    title VARCHAR(255), 
    artist VARCHAR(255), 
    rating INT(1), 
    PRIMARY KEY(id), 
    FOREIGN KEY(username)
        REFERENCES user_table(username)
        ON DELETE CASCADE
);
```
For `comments_table`
```SQL
```