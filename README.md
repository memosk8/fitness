<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300"></a></p>

# Consideraciones

En este repositorio ya se han incluido las herramientas necesarias para comenzar a desarrollar el proyecto. Se ha decidido trabajar en conjunto, esto implica lo siguiente:
   - Cada equipo tendrá que ser responsable de crear los respectivos archivos y clases necesarias para su módulo usando artisan (el procedimiento se describe más abajo).
   - Cada equipo trabajará en una rama (branch) independiente de los demás pero usando este mismo proyecto.
   - Se deben tener muy bien identificadas las entidades de cada modulo y ser consciente de las entidades de los demás modulos
   - Cada equipo se encargará de delegar el trabajo propio a sus integrantes convenientemente

## Crear archivos y clases necesarias para representar cada entidad 

Cada entidad existente dentro de una aplicación de laravel se puede representar con una clase, a la que nos referimos como modelo.
Este modelo describirá los atributos identificados para cada entidad, por lo que se deben tener bien definidos ya en cada modulo.
Cada ruta dentro de la aplicación necesita un controlador que se haga cargo de manejar todas las peticiones relacionadas con ella misma, y en laravel tenemos la capacidad de usar artisan para crear controladores de forma rápida.
Estos controladores, como su nombre hace referencia, controlan practicamente toda la acividad relacionada con sus propias rutas

### Para crear un modelo, junto con su respectiva migración (tablas en bd) y controllador usamos:
<pre>php artisan make:model {nombre_entidad} -mc</pre>


- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

