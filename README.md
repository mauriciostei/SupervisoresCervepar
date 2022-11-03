# Control se Cámaras Cervepar

![version](https://img.shields.io/badge/version-1.0.0-blue.svg) 
![license](https://img.shields.io/badge/license-MIT-blue.svg)

## Tabla de Contenido
* Pre requisitos
* Instalación

## Pre requisitos

Para correr la aplicación es necesario contar con:

 - PHP corriendo en su version 8.1 como mínimo
 - PostgreSQL corriendo en cualquier version


## Instalación
1. Clonar el repositorio inicial
2. Generar una base de datos dentro de PostgreSQL
3. Correr en la terminal `composer install`
4. Copiar `.env.example` a `.env` y actualiza los datos de la configuración, principalmente el de la base de datos
5. Correr en la terminal `php artisan key:generate`
6. Correr en la terminal `php artisan migrate --seed` para crear la base de datos