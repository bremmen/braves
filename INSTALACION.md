# Instalación del CMS Braves

Este documento describe cómo instalar y ejecutar el CMS de Braves construido con Laravel.

## Requisitos previos

- **PHP 8.2 o superior** con extensiones: pdo, sqlite, mbstring, openssl, tokenizer, xml, ctype, json
- **Composer** - [getcomposer.org](https://getcomposer.org/download/)

### Instalar PHP y Composer en macOS (Homebrew)

```bash
# Instalar PHP
brew install php

# Instalar Composer
brew install composer
```

## Instalación

Desde la raíz del proyecto, ejecuta los siguientes comandos:

```bash
# 1. Instalar dependencias PHP
composer install

# 2. Configurar entorno
cp .env.example .env
php artisan key:generate

# 3. Base de datos (SQLite por defecto)
touch database/database.sqlite
php artisan migrate
php artisan db:seed

# 4. Enlace para storage
php artisan storage:link

# 5. Iniciar servidor
php artisan serve
```

## Acceso al CMS

- **Sitio web:** http://localhost:8000
- **Panel de administración:** http://localhost:8000/admin

**Credenciales por defecto:**
- Email: `admin@braves.com`
- Contraseña: `password`

**Importante:** Cambia la contraseña después del primer inicio de sesión.

## Uso del panel admin

Desde `/admin` puedes:

1. **Configuración:** Editar textos del hero, sobre nosotros, estadísticas, contacto, footer y redes sociales
2. **Portafolio:** Crear, editar y eliminar proyectos (residencial, comercial, industrial)

## Ejecutar el servidor

```bash
php artisan serve
```

Para producción, configura un servidor web (Nginx/Apache) apuntando al directorio `public/`.

## Estructura del proyecto

```
braves/
├── app/                    # Código de la aplicación (Controllers, Models, Middleware, Providers)
├── artisan                 # CLI de Laravel
├── bootstrap/              # Archivos de arranque del framework
├── config/                 # Archivos de configuración
├── database/               # Migraciones, seeders y factories
├── public/                 # Punto de entrada web (index.php, assets)
├── resources/              # Vistas Blade, CSS/JS sin compilar
├── routes/                 # Definición de rutas (web.php, console.php)
├── storage/                # Logs, cache, archivos subidos
├── tests/                  # Tests unitarios y de integración
├── vendor/                 # Dependencias de Composer
├── composer.json           # Dependencias PHP
├── package.json            # Dependencias Node.js
├── vite.config.js          # Configuración de Vite
└── phpunit.xml             # Configuración de PHPUnit
```
