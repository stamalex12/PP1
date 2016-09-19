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

Git Workflow
--
-   Start a new feature:<br>
  `git checkout -b new-feature master`

-   Edit some files:<br>
  `git add <file>`<br>
  `git commit -m "Start a feature"`

-   Edit some files:<br>
  `git add <file>`<br>
  `git commit -m "Finish a feature"`

-   Merge the new-feature branch to the master:<br>
  `git checkout master`<br>

-   Update master.<br>
  `git pull origin master` (Resolve conflicts, if any and commit)

-   continues here for the merge.<br>
  `git merge new-feature` (Resolve conflicts, if any and commit)<br>
  `git branch -d new-feature`

-   Make sure no new changes have been made in the remote master.<br>
  `git pull origin master` (Resolve conflicts, if any and commit)
  
-   Push to the remote<br>
  `git push`