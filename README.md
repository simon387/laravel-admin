# Laravel-admin

## Project creation commands and artisan serve

+ ```composer create-project --prefer-dist laravel/laravel laravel-admin```
+ ```cd laravel-admin```
+ ```php artisan serve```

## Docker

+ new ```Dockerfile```
+ new ```docker-compose.yml```
+ ```docker-compose up```

## Database

Abbiamo modificato la tabella user e cancellato le altre

+ ```docker-compose exec backend sh```
+ dentro docker```php artisan migrate```
+ intellij settings: jdbc:mariadb://localhost:33066/admin con driver Amazon Aurora MySQL

## Per creare un controller

+ dentro docker run ```php artisan make:controller AuthController```
+ oppure ```php artisan make:controller UserController --api``` con ```--api``` crea roba in più.

## How to create a RegisterRequest

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

## Creazione nuova tabella ruoli e permessi

1. ```php artisan make:migration create_roles_table```
2. ```php artisan make:migration create_permissions_table```
3. ```php artisan migrate```
4. ```php artisan make:model Role```
5. ```php artisan make:model Permission```
6. ```php artisan ide:models``` YES
7. ```php artisan make:controller PermissionController```
8. ```php artisan make:controller RoleController```

## Esempio creazione chiave esterna

1. ```php artisan make:migration add_role_id_to_users_table```
2. modifichi il file appena creato aggiungendo le relazioni con php
3. runnare ancora ```php artisan migrate```
4. se non funzionare ```php artisan migrate:fresh```

## Creazione http resources

+ servono per customizzare i campi mostrati al front end
+ ```php artisan make:resource UserResource```

## Esempio creazione seeder

+ ```php artisan make:seeder PermissionSeeder```
+ i Seeder servono a riempire il db con dati di iniziali e/o di esempio, chiamando i relativi Factory

## Creazione tabella prodotti

+ ```php artisan make:migration create_products_table```
+ ```php artisan make:model Product```
+ ```php artisan make:controller ProductController```
+ ```php artisan make:resource ProductResource```
+ ```php artisan ide:models``` yes
+ ```php artisan make:seeder ProductSeeder```
+ ```php artisan make:factory ProductFactory```
+ modifichiamo tutte le classi create
+ ```php artisan migrate```
+ ```php artisan db:seed --class=ProductSeeder```

## Factory

I Factory servono per instanziare model con dati di default, o mock random

## Gate

I Gate li usiamo per le autorizzazioni delle api

## Comandi utili

+ ```php artisan route:list``` -> mostra tutte le rotte
+ ```php artisan db:seed``` -> crea dati mock
+ ```php artisan db:seed --class=PermissionSeeder``` -> crea dati mock solo da quella classe

## React

```npx create-react-app react-admin --template typescript```
```npm start```

## Commons errors

+ ```Docker-compose up : Error while fetching server API version: ('Connection aborted.', ConnectionRefusedError(61, 'Connection refused'))```
  soluzione: ```sudo gpasswd -a $USER docker``` e ```newgrp docker```
+ se da connection error dentro laraval, probabilmente manca il file ```.env```, riporto esempio di dev
+ ```Add [name] to fillable property to allow mass assignment on [App\Models\Role].``` -> soluzione: aggiungere questo alla classe modello: ```protected $guarded = [];```

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:WZJ6zocO96a3LMyfyEPyq248V8/xpDA8vSVoUS811sA=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=admin
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

## Links

+ https://www.udemy.com/course/react-laravel-admin/learn/lecture/24288058#overview
