# The Laravel Skeleton Application with Authorization

This is a simple app to demonstrate implementing the `spatie/laravel-permission` package to a fresh Laravel 5.5 app.

To create tables and seed demo database run this in shell:
```
$ cp .env.example .env
... update credentials in .env ...
$ composer install
$ php artisan key:generate
$ php artisan migrate --seed --step

```
It will add two users.
* admin : john@example.com / secret
* writer : mary@example.com / secret

In the case of admin user, you can find admin link in user drop-down menu.