<?php
function controllers_autoload($classname){
    include 'controller/'.$classname.'.php';
}

spl_autoload_register('controllers_autoload');

?>