# TPE - Parte 2

## Integrantes
- Joaquin Alvarez (joacoalvarez0612@gmail.com)
- John Maciel (macieljohn085@gmail.com)

## Temática

Sistema web de gestión para una cafetería


## Descripción

El sistema permite:

- Visualizar productos del menú
- Visualizar categorías
- Filtrar productos por categoría
- Administrar categorías y productos
- Iniciar sesión como administrador
- Modificar información únicamente estando autenticado


## Relaciones

- Una categoría puede tener muchos productos
- Un producto pertenece a una única categoría

Relación:

tipos_productos (1) ---- (N) productos_menu


# Tecnologías utilizadas

- PHP
- MySQL / MariaDB
- HTML
- CSS
- phpMyAdmin
- XAMPP


# Arquitectura

El proyecto fue desarrollado utilizando el patrón MVC:

- Model: acceso a datos y consultas SQL
- View: plantillas phtml
- Controller: lógica de negocio y manejo de rutas


# URLs semánticas

Ejemplos:

- /productos
- /producto/1
- /categorias
- /categoria/2
- /login
- /logout


# Usuario administrador

Usuario:
`webadmin`

Contraseña:
`admin`


# Modelo Entidad Relación (DER)

El sistema está compuesto por las siguientes entidades:

## productos_menu

Contiene los productos del menú de la cafetería.

Campos:
- id_producto
- nombre
- descripcion
- precio
- id_tipo

## tipos_productos

Contiene las categorías de productos.

Campos:
- id_tipo
- nombre
- imagen

## usuarios

Contiene los usuarios administradores del sistema.

Campos:
- id
- usuario
- password


## DER

![DER](./img/der.png)


## SQL

El archivo SQL exportado desde phpMyAdmin se encuentra en:

`/database/cafeteriaapp.sql`