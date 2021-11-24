<?php 

//AQUI SE DETERMINAN LAS RUTAS QUE SOPORTARA EL ROUTER DE LA APLICACION WEB
/** RECORDEMOS que usamos get o post para identificar el tipo de ruta. Ademas, ese metodo toma dos parametros: el primero es la ruta, y el segundo el metodo o funcion y en que controlador esta ubicado */
/**RECODEMOS que debemos importar todos los controladores necesarios y el router en este archivo. se debe hacer una nueva instancia de la clase del Router */
/** IMPORTANTE el metodo del Router llamado ComprobarRutas() es esencial para la aplicacion. Se debe llamar esa funcion al final de este documento */


require_once __DIR__ . '/includes/app.php';
use Controllers\PaginasController;
use MCV\Router; 
$router = new Router(); 

//AQUI COLOCAMOS LAS RUTAS
/** $router->get('/ruta', [Controlador::class, 'funcion']) */

//PUBLICAS
$router->get('/', [PaginasController::class, 'index']);
$router->get('/error404', [PaginasController::class, 'error404']);


//PRIVADAS USUARIOS

$router->comprobarRutas(); 