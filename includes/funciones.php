<?php

/** AQUI ESTARAN REGISTRADAS TODAS LAS FUNCIONES PHP REQUERIDAS EN EL PROYECTO */

define('TEMPLATES_URL',__DIR__ . '/templates');
define('FUNCIONES_URL',__DIR__ . 'funciones.php');
define ('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate($nombre, $inicio = false){
    include  TEMPLATES_URL . "/${nombre}.php";
}

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}
//escapa / sanitizar el HTML
function s($html) : string {
    $s=htmlspecialchars($html);
    return $s;
}

//validar id //
function validarORedireccionar(string $urlPrincipal, string $urlId){
    $id = null;
    if(empty($_GET)){
        header("Location: ${urlPrincipal}");
    }else{
        // VALIDAR QUE EL ID SEA VALIDO //
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    }

    if (!$id) {
        header("Location: ${urlPrincipal}");
    }
    return $id; 
}

