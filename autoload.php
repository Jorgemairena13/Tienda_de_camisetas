<?php
function controllers_autoload($classname){
    // Aseguramos que la primera letra sea mayúscula
    $classname = ucfirst($classname);
    $file = 'controller/' . $classname . '.php';
    
    if(file_exists($file)){
        require_once $file;
    } else {
        die("Error: El controlador $classname no existe. Buscado en $file");
    }
}
spl_autoload_register('controllers_autoload');

?>