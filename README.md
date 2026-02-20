# Braves CMS

CMS para gestión del sitio web de **Braves S.A.S**, empresa de construcción. Desarrollado con Laravel 12.

## Instalación Rápida

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed
php artisan serve
```

Para instrucciones detalladas, consulta [INSTALACION.md](INSTALACION.md).
