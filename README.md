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

+ dentro docker run ```php artisan make:controller AuthController```
+ oppure ```php artisan make:controller UserController --api``` con ```--api``` crea roba in più.

## to create a RegisterRequest

+ ```docker-compose exec backend sh```
+ ```php artisan make:request RegisterRequest```

## Laravel Sanctum
+ si usa per login, tokens, ecc
+ ```docker-compose exec backend sh``` e ```composer require laravel/sanctum```
+ ```php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"```
+ ```php artisan migrate```

## Laravel ide helper
Serve per non farti mostrare errori inutili dall'ide
+ si installa con ```composer require --dev barryvdh/laravel-ide-helper```
+ poi ```php artisan ide:generate```
+ e ```php artisan ide:models``` e ```yes```

## Comandi utili
+ ```php artisan route:list``` -> mostra tutte le rotte
+ ```php artisan db:seed``` -> crea dati mock

## Links

+ https://www.udemy.com/course/react-laravel-admin/learn/lecture/24288058#overview
