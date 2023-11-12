# Sistema Clinica

## Paper Dashboard
[Paper Dashboard Installation](https://paper-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html?_ga=2.65654574.1681493881.1590280839-1629143006.1589900399)

_Pasos de instalacion_:
- composer require laravel/ui 
- php artisan ui vue --auth
- composer require laravel-frontend-presets/paper
- php artisan ui paper

Ejecutar:
```
composer install
composer update
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```
