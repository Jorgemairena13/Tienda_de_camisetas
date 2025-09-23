<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';
require_once 'helpers/utils.php';



function show_error(){
    $error = new errorController();
    $error->index();
}

if(isset($_GET['controller']) && class_exists($_GET['controller'].'Controller')){
    $nombre_controlador = $_GET['controller'].'Controller';
    $controlador = new $nombre_controlador;

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        $action = action_default;
        $controlador->$action();
    }

}else{
    // Si no hay controlador definido, usamos el por defecto
    $nombre_controlador = controller_default.'Controller';

    if(class_exists($nombre_controlador)){
        $controlador = new $nombre_controlador;
        $action = action_default;
        $controlador->$action();
    }else{
        show_error();
    }
}

require_once 'views/layout/footer.php';


