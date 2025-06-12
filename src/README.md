# Sistema de Gestión de Tickets

Este repositorio contiene una aplicación de gestión de tickets desarrollada con **Laravel 12**. El código fuente completo se encuentra dentro del directorio [`src/`](src/), mientras que la raíz del proyecto incluye archivos de configuración y documentación adicional.

## Características principales

- **Laravel 12** con la estructura típica de controladores, modelos y vistas.
- Soporte multilingüe (español e inglés) mediante archivos de traducción ubicados en [`src/lang/en`](src/lang/en) y [`src/lang/es`](src/lang/es).
- Gestión de usuarios y administradores con roles diferenciados.
- Creación y administración de tickets con prioridades, estados y comentarios.
- Registro de eventos en el historial (`EventHistory`) y sistema de notificaciones por correo y base de datos.
- API REST protegida con **Laravel Passport**, con rutas en [`routes/api.php`](src/routes/api.php).
- Entorno de desarrollo basado en **Docker Compose** que levanta servicios de PHP, MySQL, Redis, phpMyAdmin y Mailpit.

## Estructura del proyecto

```
/
├── README.md                # Este documento
├── docker-compose.yml       # Configuración de contenedores
├── .env                     # Variables para Docker
├── src/                     # Aplicación Laravel completa
│   ├── README.md            # README original de Laravel
│   ├── app/                 # Controladores, modelos, servicios...
│   ├── routes/              # Definición de rutas web y API
│   ├── lang/                # Archivos de traducción
│   └── ...
├── DocumentacionGeneral.odt     # Documentación en formato ODT
├── DocumentacionUsuario.odt     # Manual de usuario
└── otros archivos *.docx        # Ejemplos y documentación complementaria
```

## Puesta en marcha rápida

1. Clonar el repositorio y situarse en la raíz del proyecto.
2. Copiar el archivo `.env.example` de `src/` si se necesita una configuración propia para Laravel.
3. Ejecutar los servicios con Docker:
   ```bash
   docker-compose up -d
   ```
4. Entrar al contenedor de PHP para instalar dependencias y ejecutar las migraciones:
   ```bash
   docker compose exec servicephp-fpm bash
   composer install
   php artisan migrate --seed
   ```
5. Lanzar el trabajador de colas (para notificaciones):
   ```bash
   php artisan queue:work redis
   ```
6. Acceder a la aplicación en `http://localhost:8080` (según el puerto configurado en `.env`).

## Descripción funcional

La aplicación distingue entre **usuarios** y **administradores**. Un usuario puede crear tickets, añadir comentarios y consultar el estado de los mismos. Los administradores pueden gestionar todos los tickets, asignarlos, cambiar su estado y ver un panel con estadísticas.

El historial de eventos registra altas, actualizaciones y eliminaciones de usuarios, administradores y tickets. Cada cambio significativo genera una notificación. Estas notificaciones se almacenan en la base de datos y también se envían por correo gracias a las clases dentro de [`app/Notifications`](src/app/Notifications).

Las rutas del API permiten realizar operaciones similares de manera programática. Están agrupadas en `routes/api.php` bajo los prefijos `admin` y `user` y usan tokens de acceso de Laravel Passport.

## Documentación adicional

En la raíz existen varios documentos (`*.docx` y `*.odt`) que amplían la información sobre el proyecto, las buenas prácticas y guías de uso.

---

Para más detalles sobre Laravel, consulte el [README original](src/README.md) ubicado en el directorio `src/`.
