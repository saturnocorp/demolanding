<?php 
//ROUTER DE LA APLICACION
/**Este archivo es fundamental. Contiene el soporte de rutas de la Aplicacion Web, El metodo para Mostrar las Vistas respectivas, y la proteccion de rutas administrativas, Autenticacion de usuarios*/

namespace MCV;
use Controllers\PaginasController;


class Router{
    //todas las rutas
    public $rutasGET = [];
    public $rutasPOST = []; 

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn; 
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn; 
    }


    public function comprobarRutas(){
        session_start();
        //autenticacion de usuario
        $auth = $_SESSION['login']?? null; 

        //RUTAS PROTEGIDAS PARA ZONA ADMINISTRATIVA... escribir las rutas dentro de este arreglo 

        $urlActual = $_SERVER['PATH_INFO'] ?? "/"; 
        $metodo = $_SERVER['REQUEST_METHOD']; 

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;    
        }

        if($fn){
           // existe una funcion asociada
           call_user_func($fn, $this);
        }else{
           $this->paginaNoEncontrada();
        }
    }

    public function render($view, $datos = []){
        //leyendo datos del arreglo $datos
        foreach($datos as $key => $value ){
            $$key = $value; 
        }

        ob_start(); //almacenando datos en memoria
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); //vaciando memoria y reasignado los datos a esta variable

        include_once __DIR__ . "/views/layout.php"; 
    }

    public function paginaNoEncontrada(){
        header('Location: /error404');
    }
}