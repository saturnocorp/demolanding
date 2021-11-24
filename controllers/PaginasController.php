<?php

namespace Controllers;
use MCV\Router;


Class PaginasController{
    public static function index(Router $router){
        $router->render('/paginas/index');
    }
    public static function portafolio(Router $router){
        $router->render('/paginas/portafolio');
    }
    public static function nosotros(Router $router){
        $router->render('/paginas/nosotros');
    }
    public static function servicios(Router $router){
        $router->render('/paginas/servicios');
    }
    public static function contacto(Router $router){
        $router->render('/paginas/contacto');
    }
    public static function error404(Router $router){
        $router->render('/paginas/error404');
    }

};