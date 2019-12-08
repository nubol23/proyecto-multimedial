# proyecto-multimedial

## Crear la base de datos
* Base de datos: pharmacy	
* Codificacion: utf8_general_ci

## Instalar composer
Mover el proyecto a la carpeta htdocs y ejecutar desde consola
```composer install```

## Para crear las tablas de la base de datos
Ejecutar en consola.

```php vendor/doctrine/orm/bin/doctrine orm:schema-tool:update --force```

## Funciones
Todas las funciones del backend se encuentran en a carpeta funciones

```
.
+-- composer.json
|   .
|   .
|   .
+-- entities
|   +-- Agency.php
|   +-- Bill.php
+-- reports
|   +-- factura
|   +-- inventario
|   +-- proveedor
|   +-- user
+-- src
|   +-- functions
|   |   +-- bill_functions.php
|   |   +-- client_functions.php
|   |   +-- medicine_functions.php
|   |   +-- user_functions.php
|   +-- test_creations.php
|   +-- tests.php
|   .
|   .
|   .
```

## Reports

Inventario just call inventario.

Factura just call factura($id), id as bill(id)

Proveedor just call proveedor()

User just call user($id), id as client(id), show bills of a user.

