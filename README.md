# Bus Station Management System

## Installing

follow these steps to install:

1. #### First, clone this project: open git and run this command.
``` 
git clone https://github.com/Abokorhassan/BSProject.git 
```

2. #### Then, open git in root directory and install composer
```
composer install
```

3. #### Permission : run these two command.
```
chmod -R 775 storage
chmod 775 bootstrap/cache
```

5. #### Database credentials
 `
 cp .env.example .env
 `
 ##### then modify your .env to match yours previous database, if any ofcourse.

6. #### Generate Key
`
php artisan key:generate
`

7. #### Create Database: create database, then import if you already have database file 

for more info, follow this https://lorvent.gitbooks.io/josh/content/laravel-55.html
