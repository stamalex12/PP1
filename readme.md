**Steps to complete individually:**

Migrations
-
-   Run `php artisan migrate` to create database tables. (Provided you have supplied your database details in .env and config/app.php files)


Composer
-
--
**Update**
-   Run `composer update` to install all dependencies

--
**Refresh**
1. `php  path\to\composer.phar dump-autoload -o`
2. `php artisan route:clear`
3. `php artisan cache:clear`
4. `php artisan config:cache`
5. `php artisan route:cache`