# SportXpress — E-commerce de indumentaria deportiva

Aplicación web de comercio electrónico desarrollada como proyecto académico para la gestión y venta de indumentaria deportiva.

## Descripción

SportXpress permite a los usuarios explorar un catálogo de productos, gestionar un carrito de compras, seleccionar una forma de pago, confirmar pedidos y consultar su historial de compras.

El sistema también cuenta con un panel administrativo para la gestión integral de usuarios, roles, categorías, productos, consultas y ventas.

## Funcionalidades

### Cliente
- Registro e inicio de sesión
- Consulta del catálogo
- Filtrado por categorías
- Carrito de compras
- Selección de forma de pago
- Confirmación de compras
- Historial de compras
- Consulta de comprobantes
- Descarga de comprobantes en PDF
- Envío de comprobantes por correo electrónico

### Administrador
- Gestión de usuarios
- Gestión de roles
- Gestión de categorías
- Gestión de productos
- Consulta y gestión de ventas
- Gestión de consultas recibidas
- Visualización de información general del sistema

## Tecnologías

- PHP 8.3
- Laravel 13
- MariaDB
- SQL
- HTML
- CSS
- Bootstrap
- Vite
- Laravel DomPDF
- Git / GitHub

## Arquitectura y desarrollo

El proyecto fue desarrollado utilizando la arquitectura MVC de Laravel y una base de datos relacional.

Se utilizaron:

- Controllers para la lógica de la aplicación
- Models y Eloquent para el acceso a datos
- Migrations para definir la estructura de la base de datos
- Seeders para cargar datos iniciales
- Blade para las vistas
- Middleware para controlar el acceso según el rol del usuario

## Base de datos

La aplicación utiliza MariaDB.

La estructura de la base de datos se gestiona mediante migrations y los datos iniciales mediante seeders.

## Instalación

### Requisitos

- PHP
- Composer
- Node.js y npm
- MariaDB

### Pasos

1. Clonar el repositorio.

2. Instalar dependencias de PHP:

```bash
composer install
```

3. Instalar las dependencias frontend:

```bash
npm install
```

4. Crear el archivo .env a partir de .env.example.

5. Configurar en .env los datos correspondientes a la base de datos.

6. Generar la clave de la aplicación:

```bash
php artisan key:generate
```

7. Ejecutar migrations y seeders:

```bash
php artisan migrate --seed
```

8. Iniciar Vite:

```bash
npm run dev
```
9. Iniciar la aplicacion:

```bash
php artisan serve
```
Para generar los archivos frontend para producción:

```bash
npm run build
```

Proyecto académico

Proyecto desarrollado en equipo como parte de la formación universitaria en Sistemas de Información.

Rama con la versión estable

La versión funcional y recuperada del proyecto se encuentra en:

estado-estable-luego-de-la-recuperacion

Autores

**Jimena Torreani**
**Mauricio Lencinas**