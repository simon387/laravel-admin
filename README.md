# Laravel-admin

## Project creation commands and artisan serve
+ ```composer create-project --prefer-dist laravel/laravel laravel-admin```
+ ```cd laravel-admin```
+ ```php artisan serve```
## Docker
+ new ```Dockerfile```
+ new ```docker-compose.yml```
+ ```docker-compose up```
## db
Abbiamo modificato la tabella user e cancellato le altre
+ ```docker-compose exec backend sh```
+ dentro docker```php artisan migrate```
## to create a controller
run dentro docker run ```php artisan make:controller AuthController```

## Links
+ https://www.udemy.com/course/react-laravel-admin/learn/lecture/24288058#overview
