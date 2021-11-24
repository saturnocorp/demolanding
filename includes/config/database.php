<?php

//ARCHIVO QUE CONECTA A LA BASE DE DATOS

function conectarDB(): mysqli {

    $db = new mysqli('sql209.epizy.com', 'epiz_30428608', '8K0aA3pBMmBjcM', 'epiz_30428608_landingpageuno');

     if(!$db){
         echo 'ERROR no se pudo conectar';
         exit;
     }
     return $db; 

}