# proyecto-multimedial

## Crear la base de datos
* Nombre: pharmacy	
* Codificacion: utf8_general_ci

## Instalacion usando composer
Mover el proyecto a la raiz de la carpeta xampp/htdocs o ejecutar ```git clone https://github.com/nubol23/proyecto-multimedial.git```
```composer install```

## Generar getters y setters
En caso de requerir una modificacion de la base de datos ejecutar ```php vendor/bin/doctrine orm:generate-entities .```

## Actualizar la base de datos
Ejecutar en Linux:

```php vendor/bin/doctrine orm:schema-tool:update --force```

Ejecutar en Windows:

```php vendor/doctrine/orm/bin/doctrine orm:schema-tool:update --force```

## Funciones
Todas las funciones de interaccion con la base de datos se encuentran en el directorio functions, existen funciones de alta, baja y modificacion.

```
.
+-- composer.json
|   .
|   .
|   .
+-- entities
|   +-- Agency.php
|   +-- Bill.php
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
