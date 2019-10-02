# BSProject

1- git clone or download.

Get Composer packages
2- composer install

permissions
3-chmod -R 775 storage
4-chmod 775 bootstrap/cache

database credentials
5- cp .env.example .env
then modify your .env to match yours previous

Generate Key
6- php artisan key:generate

Create Database
7- create database, then import if you already have database file 

for more info, follow this https://lorvent.gitbooks.io/josh/content/laravel-55.html
