
# Consideraciones del proyecto

En este repositorio ya se han incluido las herramientas necesarias para comenzar a desarrollar el proyecto. Se ha decidido trabajar en conjunto, esto implica lo siguiente:
   - Cada equipo tendrá que ser responsable de crear los respectivos archivos y clases necesarias para su módulo usando artisan (el procedimiento se describe más abajo).
   - Cada equipo trabajará en una rama (branch) independiente de los demás pero usando este mismo proyecto.
   - Se deben tener muy bien identificadas las entidades de cada modulo y ser consciente de las entidades de los demás modulos
   - Cada equipo se encargará de delegar el trabajo propio a sus integrantes convenientemente

# Crear archivos y clases necesarias para representar cada entidad 

Cada entidad existente dentro de una aplicación de laravel se puede representar con una clase, a la que nos referimos como modelo.

Este modelo describirá los atributos identificados para cada entidad, por lo que se deben tener bien definidos ya en cada modulo.

Cada ruta dentro de la aplicación necesita un controlador que se haga cargo de manejar todas las peticiones relacionadas con ella misma, y en laravel tenemos la capacidad de usar artisan para crear controladores de forma rápida.

Estos controladores, como su nombre hace referencia, controlan practicamente toda la acividad relacionada con sus propias rutas

## Para crear un modelo, junto con su respectiva migración (tablas en bd) y controllador usamos:
<ul><li><h3><pre>php artisan make:model {<i>nombre_entidad</i>} -mc </pre></h3></li></ul>

<i>nombre_entidad</i> debe ser preferentemente singular, por ejemplo <i>producto</i> o <i>socio</i>

Los parametros **-m** y **-c** que en este caso se usan juntos **-mc** indican respectivamente que el modelo a crear tambien tendrá una **m**igración y un **c**ontrolador (el orden no importa)

### Se debe ejecutar ese comando para cada una de las entidades de cada módulo
Una vez creados los archivos y clases necesarias, ahora nos corresponde agregar los atributos de cada una de nuestras entidades.<br>
Para ello debemos modificar cada uno de los modelos ubicados en la ruta del proyecto <b>app/Models</b>
Al momento de crear un nuevo proyecto de laravel 

## Recursos consultados 
   - **eloquent** (para manejar relaciones en laravel)
	https://laravel.com/docs/8.x/eloquent
   - **bootstrap en laravel 8**
	https://www.positronx.io/how-to-properly-install-and-use-bootstrap-in-laravel/
   - **laravel/UI**
	https://laravelarticle.com/laravel-8-authentication-tutorial
   - **laravel CRUD**
	https://www.digitalocean.com/community/tutorials/simple-laravel-crud-with-resource-controllers
   - **bootstrap templates**
	https://startbootstrap.com/admin-dashboard?showAngular=false&showPro=false
	https://www.w3schools.com/bootstrap/bootstrap_templates.asp


## [documentación oficial de laravel](https://laravel.com/docs)

